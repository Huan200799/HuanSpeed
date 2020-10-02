<?php
namespace App\Repositories\Eloquent;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Order;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\StatisticProductRepositoryInterface;
use DB;
use Carbon\Carbon;
class StatisticProductRepository extends BaseRepository implements StatisticProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Order::class;
    }

    public function getStatisticHours(){
        $hours = $this->model->whereBetween('created_at', [now()->format('Y-m-d H:00:00'),now()->addHours(1)->format('Y-m-d H:00:00')])
        ->count();
        return $hours;
    }

    public function getStatisticDay(){
        $day = $this->model->select(DB::raw('count(id) as total'))
            ->where(DB::raw('date(created_at)'), date("Y-m-d"))->groupBy(DB::raw('date(created_at)'))->count();
        return $day;
    }

    public function getStatisticWeek(){
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        $week = $this->model->whereBetween('created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->count();
        return $week;
    }

    public function getStatisticMonth(){
        $currentMonth = date('m');
        $month = $this->model->whereRaw('MONTH(created_at) = ?',[$currentMonth])->count();
        return $month;
    }

    public function getStatisticQuarter(){
        $quarter = $this->model->whereRaw('QUARTER(created_at) = ?', Carbon::now()->quarter)->count();
        return $quarter;
    }

    public function getStatisticYear(){
        $currentYear = date('Y');
        $year = $this->model->whereRaw('YEAR(created_at) = ?',[$currentYear])->count();
        return $year;
    }

}
