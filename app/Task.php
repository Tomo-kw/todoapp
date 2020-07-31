<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * 優先順位の設定
     */
    const STATUS = [
        1 => ['priority' => '低', 'class' => 'badge-light'],
        2 => ['priority' => '中', 'class' => 'badge-primary'],
        3 => ['priority' => '高', 'class' => 'badge-danger'],
    ];

    /**
     * 優先順位の表示
     */
    public function getStatusPriorityAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        return self::STATUS[$status]['priority'];
    }

    public function getStatusClassAttribute()
    {
        $status = $this->attributes['status'];

        return self::STATUS[$status]['class'];
    }

    /**
     * 年月日の整形
     */
    public function getFormatDueDateAttribute()
    {        
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
            ->format('Y/m/d');
    }
}
