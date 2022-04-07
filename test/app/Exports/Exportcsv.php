<?php

namespace App\Exports;

use App\Models\UserModel;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;



class Exportcsv implements FromCollection,WithHeadings

{
    
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
       // dd($data);
       return collect($data);
    }
   
}
