<?php

namespace App\Domain\Routes\Actions;


use App\Domain\Routes\Models\Route;

class CreateContractRouteAction
{
    private $from_id;
    private $to_id;
    private $truck_type_id;
    private $is_active;
    private $deactivation_reason;
    private $deactivated_by;


    public function __construct( $from_id, $to_id,$truck_type_id,$is_active,$deactivation_reason,$deactivated_by)
    {
        $this->from_id = $from_id;
        $this->to_id = $to_id;
        $this->truck_type_id = $truck_type_id;
        $this->is_active = $is_active;
        $this->deactivation_reason = $deactivation_reason;
        $this->deactivated_by = $deactivated_by;
    }

    public function handle($contract)
    {

        return Route::create([
            'from_id' => $this->from_id,
            'to_id' => $this->to_id,
            'truck_type_id'=>$this->truck_type_id,
            'is_active' => $this->is_active,
            'deactivation_reason' => $this->deactivation_reason,
            'deactivated_by' => $this->deactivated_by,
            'created_by' => 1
        ]);
    }
}
