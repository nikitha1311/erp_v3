<?php
namespace App\Domain\LHAs\Models;

use Carbon\Carbon;

class LHAsTimestampCreater
{
    private $lha;
    private $request;
    private $notification = [];

    public function __construct($lha,$request)
    {
        $this->lha = $lha;
        $this->request = $request;
    }

    public function handle()
    {
        $val = Carbon::parse($this->request->time);
        switch($this->request->log_type)
        {
            case 'loading_released' :
                return $this->updateLoadingReleased($this->lha, $this->request, $val);
                break;
            case 'unloading_reported' :
                return $this->updateUnloadingReported($this->lha, $this->request, $val);
                break;
            case 'unloading_released' :
                return $this->updateUnloadingReleased($this->lha, $this->request, $val);
                break;
            case 'loading_reported':
                return $this->updateLoadingReported($this->lha, $this->request, $val);
                break;
            default :
                return $this->notification = [
                    'type'=>'error','msg'=>'Unable to update. System error'
                ];
        }
    }

    public function updateLoadingReported($lha,$request,$val)
    {
        if(is_null($lha->loading_released) || ($lha->loading_released->diffinMinutes($val, false) <= 0))
        {
            return $this->updateOrder($lha, $request,$val);
        }
        return $this->notification =[
            'type' =>'error',
            'msg' =>'Update Loading Reported value is need to less then Loading Released '
        ];
    }

    public function updateLoadingReleased($lha ,$request, $val)
    {
        if(!is_null($lha->loading_reported) && ($lha->loading_reported->diffinMinutes($val, false) >= 0))
        {
            if((is_null($lha->unloading_reported)) || ($lha->unloading_reported->diffinMinutes($val, false) <= 0))
            {
                return $this->updateOrder($lha, $request,$val);
            }
        }
        return $this->notification = [
            'type' =>'error',
            'msg' =>'Update previous/Next values to update '.ucwords(str_replace('_',' ', $request->log_type))
        ];
    }

    public function updateUnloadingReported($lha, $request, $val)
    {
        if(!is_null($lha->loading_released) && ($lha->loading_released->diffinMinutes($val, false) >= 0))
        {
            if((is_null($lha->unloading_released)) || ($lha->unloading_released->diffinMinutes($val, false) <= 0))
            {
                return $this->updateOrder($lha, $request,$val);
            }
        }
        return $this->notification = [
            'type' =>'error',
            'msg' =>'Update previous/Next values to update '.ucwords(str_replace('_',' ', $request->log_type))
        ];
    }

    public function updateUnloadingReleased($lha, $request, $val)
    {
        if(!is_null($lha->unloading_reported) && ($lha->unloading_reported->diffinMinutes($val, false) >= 0))
        {
            return $this->updateOrder($lha, $request,$val);
        }
        return $this->notification = [
            'type' =>'error',
            'msg' =>'Update previous/Next values to update '.ucwords(str_replace('_',' ', $request->log_type))
        ];
    }

    public function updateOrder($lha, $request, $val)
    {
        $lha->update([
            $request->log_type => $val,
        ]);
        $lha->calculateDetention();
        return $this->notification = [
            'type' => 'success',
            'msg' => ucwords(str_replace('_',' ', $request->log_type)).' Updated Successfully'
        ];
    }
}
