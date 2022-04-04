<?php

namespace App\Exports;

use App\Models\UserModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class Exportcsv implements FromCollection,WithHeadings

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'id',
            'email',
            'name',
            'birthday',
            'gender',
            'role'

        ];
    }
   
    public function collection()
    {
        //return UserModel::all();

        $data=UserModel::getUserExprot();
        
        foreach($data as $key => $value)
        {
           
          $value->birthday=date('d-m-Y', strtotime($value->birthday));
          if($value->gender== 1)
          {
            $value->gender ='Male';
          }else
            $value->gender ='Female';
        
        }

        return collect($data);
    }
   
}
