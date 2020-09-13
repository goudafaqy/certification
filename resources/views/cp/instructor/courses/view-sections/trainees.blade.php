<div class="outer-container">
    @if(!isset($trainees))
    <div class="row">
        <div class="col-12" style="color: #FFF;">
            <div class="alert alert-info">
                لا يوجد متدربين لهذه الدورة <i class="fa fa-exclamation-circle"></i>
            </div>
        </div>
    </div>
    @else
    <form action="{{route('generate_certificates')}}" method="post">

    <button type="submit" class="btn btn-primaryy mt-2 mx-auto"  style="padding:10px 24px;float: left;">استخراج الشهادات</button>
    <button type="button" class="btn btn-primaryy mt-2 mx-auto" data-toggle="modal" data-target="#exampleModalCenter" style="padding:10px 24px;float: left;margin-left:10px !important">ايميل</button>
   

    <div class="row">

      

        <div class="col-12">
            <table id="dtBasicExample" class="table course-table" width="100%">
                <thead>
                    <tr>
                    
                        <th class="th-sm text-center"><label style="margin-right: 20px;"><input type="checkbox" id="select-all" /></label> الكل</th>
                        <th class="text-center">#</th>
                        <th class="text-center">اسم الطالب</th>
                    </tr>
                </thead>
                <tbody>
                    @csrf
                    <input type="hidden" value="{{$course->id}}" name="course" >
                    @foreach ($trainees as $trainee)
                    <tr class="odd" style="color:#283045;line-height:3.5rem">
                        <td class="text-center"><label><input type="checkbox"  value="{{ $trainee->id }}" name="ids[]" /></label></td>
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td class="priority text-center">{{ $trainee->name_ar }}</td>
                    </tr>
                    @endforeach
                    
                   
                </tbody>
            </table>
        </div>
    </div>

    </form>
    @endif

    
</div>




