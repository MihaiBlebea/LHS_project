<?php

namespace App;

class Parse
{
    private $year;

    private $days;

    public function __construct(string $year)
    {
        $this->year = $year;
        $this->days = $this->days();
    }

    private function days()
    {
        $result = [];
        for($i = 0; $i < 12; $i++)
        {
            $month = $i + 1;
            $date = $this->year . '-' . $month . '-01';
            $day = (int) date("t", strtotime($date));

            $salary_day = $this->calculateLastFriday($this->year, $month, $day);

            $first_pay = $this->calculateNextMonday($this->year, $month, 1);
            $second_pay =  $this->calculateNextMonday($this->year, $month, 15);

            $result[$month] = [
                "month"      => $month,
                "last_day"   => $day,
                "salary_day" => $salary_day,
                "first_pay"  => $first_pay,
                "second_pay" => $second_pay,
            ];
        }
        return $result;
    }

    public function get()
    {
        return $this->days;
    }

    private function composeDate($year, $month, $day)
    {
        return date("w", strtotime($year . "-" . $month . "-" . $day));
    }

    private function calculateLastFriday($year, $month, $day)
    {
        $day_of_the_week = $this->composeDate($year, $month, $day);

        if($day_of_the_week == 0)
        {
            $day = $day - 2;
        }

        if($day_of_the_week == 6)
        {
            $day = $day - 1;
        }

        return $day;
    }

    private function calculateNextMonday($year, $month, $day)
    {
        $day_of_the_week = $this->composeDate($year, $month, $day);

        if($day_of_the_week == 0)
        {
            $day = $day + 1;
        }

        if($day_of_the_week == 6)
        {
            $day = $day + 2;
        }

        return $day;
    }
}
