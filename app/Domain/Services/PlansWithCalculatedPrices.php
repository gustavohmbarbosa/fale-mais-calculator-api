<?php

namespace App\Domain\Services;

use App\Domain\Entities\Plan;

class PlansWithCalculatedPrices
{
    /**
     * Rate by origin and destiny provided.
     *
     * @var float
     */
    protected float $rate;

    /**
     * Extra minutes rate.
     *
     * @var float
     */
    protected float $extraMinutesRate;

    /**
     * Total number of minutes desired to use.
     *
     * @var int
     */
    protected int $minutes;

    public function params(float $rate, int $minutes): PlansWithCalculatedPrices
    {
        $this->rate = $rate;
        $this->minutes = $minutes;
        $this->extraMinutesRate = 0.10;

        return $this;
    }

    /**
     * @param Plan[] $plans
     *
     * @return array
     */
    public function getPlansWithCalculatedPrices(array $plans): array
    {
        $plans = collect($plans)->map(function (Plan $plan) {
            return [
                'name' => $plan->name,
                'minutes_per_mouth' => $plan->max_minutes,
                'price_with_plan' => $this->getPriceWithPlan($plan),
                'price_without_plan' => $this->getPriceWithoutPlan($plan)
            ];
        });

        return $plans->toArray();
    }

    /**
     * Get price with plan.
     *
     * @param Plan $plan
     *
     * @return string
     */
    public function getPriceWithPlan(Plan $plan): string
    {
        $minutesSurplus = $this->getMinutesSurplus($plan->max_minutes);
        $price = ($this->rate * $minutesSurplus) * ($this->extraMinutesRate + 1); // i * (t - T)) * (ip + 1)

        return number_format($price, 2, ',', '.');
    }

    /**
     * @param int $maxMinutes
     *
     * @return int
     */
    protected function getMinutesSurplus(int $maxMinutes): int
    {
        $minutesSurplus = $this->minutes - $maxMinutes;

        if ($minutesSurplus < 0) {
            return 0;
        }

        return $minutesSurplus;
    }

    /**
     * Get price without plan.
     *
     * @return string
     */
    public function getPriceWithoutPlan(): string
    {
        $price = $this->rate * $this->minutes;
        return number_format($price, 2, ',', '.');
    }
}
