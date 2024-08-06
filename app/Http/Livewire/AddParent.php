<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Nationalitie;
use App\Models\Type_blood;
use App\Models\Religion;
use App\Models\My_Parent ;
use App\Models\ParentAttachment ;
use Livewire\WithFileUploads;
use Hash ;

class AddParent extends Component
{
    use WithFileUploads ;
    public $successMessage , $catchError , $show_table = true , $updatedMode = false , $parent_updated_id ;
    // father info
    public $currentStep = 1  , $email , $password , $Name_Father , $Name_Father_en , $Job_Father
        , $Job_Father_en , $National_ID_Father , $Passport_ID_Father , $Phone_Father , $Nationality_Father_id
        ,$Blood_Type_Father_id , $Religion_Father_id , $Address_Father , $photos;

    // mother info
    public $Name_Mother, $Name_Mother_en, $National_ID_Mother, $Passport_ID_Mother,$Phone_Mother, $Job_Mother,
            $Job_Mother_en, $Nationality_Mother_id, $Blood_Type_Mother_id, $Address_Mother, $Religion_Mother_id;

    public function render()
    {
        return view('livewire.add-parent' , [
            'Nationalities' => Nationalitie::all() ,
            'Type_Bloods' => Type_blood::all() ,
            'Religions' => Religion::all() ,
            'My_Parents' => My_Parent::all()

        ]);
    }

    // validation real time
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName , [
            'email' => 'required|email' ,
            'National_ID_Father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Father' => 'min:10|max:10',
            'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'National_ID_Mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Mother' => 'min:10|max:10',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    }

    // add parent
    public function showForm()
    {
        $this->show_table = false ;
    }

    public function firstStepSubmit()
    {
        $this->validate([
            'email' => 'required|unique:my__parents,email,'.$this->id,
            'password' => 'required',
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:my__parents,National_ID_Father,' . $this->id,
            'Passport_ID_Father' => 'required|unique:my__parents,Passport_ID_Father,' . $this->id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',
        ]);
        $this->currentStep = 2 ;
    }

    public function secondStepSubmit()
    {
        $this->validate([
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            'National_ID_Mother' => 'required|unique:my__parents,National_ID_Mother,' . $this->id,
            'Passport_ID_Mother' => 'required|unique:my__parents,Passport_ID_Mother,' . $this->id,
            'Phone_Mother' => 'required',
            'Job_Mother' => 'required',
            'Job_Mother_en' => 'required',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
        ]);
        $this->currentStep = 3 ;
    }

    public function submitForm()
    {
        try{
            $parent = My_Parent::create([
                // father info
                'Name_Father' => ['ar' => $this->Name_Father , 'en' => $this->Name_Father_en],
                'Job_Father' => ['ar' => $this->Job_Father , 'en' => $this->Job_Father ],
                'email' => $this->Email ,
                'password' => Hash::make($this->Password) ,
                'National_ID_Father' => $this->National_ID_Father ,
                'Passport_ID_Father' => $this->Passport_ID_Father ,
                'Phone_Father' => $this->Phone_Father,
                'Nationality_Father_id' => $this->Nationality_Father_id ,
                'Blood_Type_Father_id' => $this->Blood_Type_Father_id ,
                'Religion_Father_id' => $this->Religion_Father_id ,
                'Address_Father' => $this->Address_Father ,

                // mother info
                'Name_Mother' => ['ar' => $this->Name_Mother , 'en' => $this->Name_Mother_en],
                'Job_Mother' => ['ar' => $this->Job_Mother , 'en' => $this->Job_Mother ],
                'National_ID_Mother' => $this->National_ID_Mother ,
                'Passport_ID_Mother' => $this->Passport_ID_Mother ,
                'Phone_Mother' => $this->Phone_Mother,
                'Nationality_Mother_id' => $this->Nationality_Mother_id ,
                'Blood_Type_Mother_id' => $this->Blood_Type_Mother_id ,
                'Religion_Mother_id' => $this->Religion_Mother_id ,
                'Address_Mother' => $this->Address_Mother ,
            ]);

            if(! empty($this->photos))
            {
                foreach ($this->photos as $photo) {
                    $photo->storeAs($this->National_ID_Father , $photo->getClientOriginalName() , $disk = 'parent_attacments');
                    ParentAttachment::create([
                        'file_path' => $photo->getClientOriginalName(),
                        'parent_id' => $parent->id ,
                    ]);
                }
            }
            $this->successMessage = trans('parent.addedInfoParent');
            $this->clearForm() ;
            $this->currentStep = 1 ;
        }
        catch(\Exception $e)
        {
            $this->catchError = $e->getMessage() ;
        }


    }

    // edit parent

    public function edit($id)
    {
        try{
            $this->updatedMode = true ;
            $this->show_table = false ;
            $my_parent = My_Parent::find($id) ;
            $this->fillFormFieldForUpdated($my_parent);
        }
        catch(\Exception $e)
        {
            $this->catchError = $e->getMessage() ;
        }


    }

    public function firstStepSubmitUpdated()
    {

        $this->currentStep = 2 ;
    }

    public function secondStepSubmitUpdated()
    {
        $this->currentStep = 3 ;
    }

    public function submitFormUpdated()
    {
        try
        {
            $this->parent_updated_id;
            $my_parent = My_Parent::find($this->parent_updated_id) ;
            $my_parent->update([
                'email' => $this->email ,
                'National_ID_Father' => $this->National_ID_Father ,
                'Passport_ID_Father' => $this->Passport_ID_Father,
                'Job_Father' => ['ar' => $this->Job_Father , 'en' => $this->Job_Father ] ,
                'Name_Father' => ['ar' => $this->Name_Father , 'en' => $this->Name_Father_en ] ,
                'Phone_Father' => $this->Phone_Father,
            ]);
            $this->successMessage = trans('site.updated') ;
            $this->show_table = true ;
        }
        catch(\Exception $e){
            $this->catchError = $e->getMessage() ;
        }

    }

    // delete

    public function destroy($id)
    {
        try
        {
            if(My_Parent::where('id' , $id)->exists())
            {
                My_Parent::find($id)->delete() ;
                $this->successMessage = trans('site.delete') ;
            }
            else
            {
                $this->catchError = 'البيانات غير موجودة او تم حذفها مسبقا' ;
            }
        }
        catch(\Exception $e)
        {
            $this->catchError = $e->getMessage() ;
        }
    }

    public function clearForm()
    {
        $this->reset([
            'Name_Father','Name_Father_en' , 'email' , 'password' , 'Job_Father' , 'Job_Father_en' , 'National_ID_Father',
            'Passport_ID_Father' ,'Phone_Father' ,'Nationality_Father_id' , 'Blood_Type_Father_id' , 'Religion_Father_id' ,
            'Address_Father' , 'Name_Mother' , 'Name_Mother_en' , 'National_ID_Mother' , 'Passport_ID_Mother' , 'Phone_Mother' ,
            'Job_Mother' , 'Job_Mother_en' , 'Nationality_Mother_id' , 'Blood_Type_Mother_id' , 'Address_Mother' , 'Religion_Mother_id'
            ]);
    }

    public function back($page)
    {
        $this->currentStep = $page ;
    }


    public function fillFormFieldForUpdated($my_parent)
    {
        $this->parent_updated_id = $my_parent->id ;
        $this->email = $my_parent->email;
        $this->password = $my_parent->password;
        $this->Name_Father = $my_parent->getTranslation('Name_Father', 'ar');
        $this->Name_Father_en = $my_parent->getTranslation('Name_Father', 'en');
        $this->Job_Father = $my_parent->getTranslation('Job_Father', 'ar');;
        $this->Job_Father_en = $my_parent->getTranslation('Job_Father', 'en');
        $this->National_ID_Father =$my_parent->National_ID_Father;
        $this->Passport_ID_Father = $my_parent->Passport_ID_Father;
        $this->Phone_Father = $my_parent->Phone_Father;
        $this->Nationality_Father_id = $my_parent->Nationality_Father_id;
        $this->Blood_Type_Father_id = $my_parent->Blood_Type_Father_id;
        $this->Address_Father =$my_parent->Address_Father;
        $this->Religion_Father_id =$my_parent->Religion_Father_id;

        $this->Name_Mother = $my_parent->getTranslation('Name_Mother', 'ar');
        $this->Name_Mother_en = $my_parent->getTranslation('Name_Father', 'en');
        $this->Job_Mother = $my_parent->getTranslation('Job_Mother', 'ar');;
        $this->Job_Mother_en = $my_parent->getTranslation('Job_Mother', 'en');
        $this->National_ID_Mother =$my_parent->National_ID_Mother;
        $this->Passport_ID_Mother = $my_parent->Passport_ID_Mother;
        $this->Phone_Mother = $my_parent->Phone_Mother;
        $this->Nationality_Mother_id = $my_parent->Nationality_Mother_id;
        $this->Blood_Type_Mother_id = $my_parent->Blood_Type_Mother_id;
        $this->Address_Mother =$my_parent->Address_Mother;
        $this->Religion_Mother_id =$my_parent->Religion_Mother_id;
        $this->Email = $my_parent->Email ;
    }
}
