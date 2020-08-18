<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\TableView;
use App\Domain\Users\Models\User;
use App\Filters\UsersBranchFilter;

class UsersTableView extends TableView
{
    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository():Builder
    {
        return User::query()->with('branch');
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return ['Name', 'Email', 'Phone', 'Branch'];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [$model->name, $model->email, $model->phone, $model->branch->name];
    }

    public $searchBy = ['name', 'email','phone'];

    protected $paginate = 10;

    protected function filters()
    {
        return [
            new UsersBranchFilter,
        ];
    }
    
}
