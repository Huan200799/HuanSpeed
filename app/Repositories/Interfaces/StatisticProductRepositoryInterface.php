<?php
namespace App\Repositories\Interfaces;

interface StatisticProductRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getStatisticHours();
    public function getStatisticDay();
    public function getStatisticWeek();
    public function getStatisticMonth();
    public function getStatisticQuarter();
    public function getStatisticYear();
}
