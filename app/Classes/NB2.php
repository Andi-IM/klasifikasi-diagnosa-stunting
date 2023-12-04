<?php

class NB2
{
    private $prior;
    private $likelihood;

    public function __construct()
    {
        $this->prior = [];
        $this->likelihood = [];
    }

    public function train(array $samples, array $labels)
    {
        foreach ($labels as $index => $label) {
            $this->prior[$label] = (isset($this->prior[$label]) ? $this->prior[$label] + 1 : 1) / count($labels);
        }

        foreach ($samples as $index => $sample) {
            foreach ($sample as $attribute => $value) {
                if (!isset($this->likelihood[$attribute][$label])) {
                    $this->likelihood[$attribute][$label] = (isset($this->likelihood[$attribute][$label]) ? $this->likelihood[$attribute][$label] + 1 : 1) / count($labels);
                }
            }
        }
    }

    public function predict(array $sample)
    {
        $classWithHighestPosterior = '';
        $maxPosterior = PHP_INT_MIN_VALUE;

        foreach ($this->prior as $label => $prior) {
            $posterior = $prior;
            foreach ($sample as $attribute => $value) {
                if (isset($this->likelihood[$attribute][$label])) {
                    $posterior *= $this->likelihood[$attribute][$label];
                }
            }

            if ($posterior > $maxPosterior) {
                $classWithHighestPosterior = $label;
                $maxPosterior = $posterior;
            }
        }

        return $classWithHighestPosterior;
    }
}


