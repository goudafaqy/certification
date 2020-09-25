<div class="outer-container">
    <div class="row justify-content-center">

        @error('name_ar')
            <div class="alert alert-danger" role="alert">
              <strong>اسم الملف مطلوب </strong>
            </div>
        @enderror      
        @error('source')
            <div class="alert alert-danger" role="alert">
              <strong>ملفات غير صحيحة </strong>
            </div>
        @enderror    
        

        <div class="col-12" style="color:#283045;">
          <button type="button" class="btn btn-primaryy mt-2 mx-auto" data-toggle="modal" data-target="#AddNewMaterial"
           style="padding:10px 24px;float: right;margin-right:10px !important">أضافة ملف جديد</button>
        </div>
    </div>
    @if(!isset($files))
    <div class="row">
        <div class="col-12" style="color: #FFF;">
            <div class="alert alert-info">
                لا يوجد ملفات لهذه الدورة <i class="fa fa-exclamation-circle"></i>
            </div>
        </div>
    </div>@include('cp.materials.form-dialog')
    @else
       
    <div class="row justify-content-center">


            <div class="col-md-12">

                                        
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            @if (\Session::has('error'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('error') !!}</li>
                    </ul>
                </div>
            @endif

            <table id="dtBasicExample" class="table course-table" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">اسم الملف</th>
                        <th class="text-center">نوع الملف</th>
                        <th class="text-center">وصف الملف</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                    <tr class="odd" style="color:#283045;line-height:3.5rem">

                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td class="priority text-center">{{ $file->name_ar }}</td>
                        <td class="text-center">
                            @if($file->type == 'guide_t')
                            {{__('app.Material guide_t')}}
                            @elseif($file->type == 'guide_i')
                            {{__('app.Material guide_i')}}
                            @elseif($file->type == 'img')
                            {{__('app.Material img')}}
                            @elseif($file->type == 'extra')
                            {{__('app.Material extra')}}
                            @else
                            {{__('app.Material book')}}
                            @endif
                        </td>
                        <td class="priority text-center">{{ $file->description }}</td>
                        <td class="priority text-center">
                            <a href="{{ url($file->source) }}" target="_blanck" class="btn btn-primary">تحميل الملف <i class="fa fa-download"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>