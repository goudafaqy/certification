<div class="outer-container">
    @if(count($updates) == 0)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="background-color: #a58661; color: #FFF; border-radius: 5px;">
                    لا يوجد إعلانات
                </div>
            </div>
        </div>
    </div>
    @else
        @foreach($updates as $update)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="background-color: #ddd; color: #273345; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                        <div class="content text-right" style="float: right; display: inline-block;">
                            {{ $update->content }}
                        </div>
                    </div>
                    <div class="card-footer text-left" style="background-color: #ddd; padding: 5px 20px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; color: #999">
                        {{ $update->created_at }}      
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>