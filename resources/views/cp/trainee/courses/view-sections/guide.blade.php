<div class="outer-container">
    @if(!isset($guide))
    <div class="row">
        <div class="col-12" style="color: #FFF;">
            <div class="alert alert-info">
                لا يوجد كتيب تدريبي لهذه الدورة <i class="fa fa-exclamation-circle"></i>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-12">
            <iframe src="{{ url($guide->source)}}" height="800px" width="100%" title="pdf_viewer"></iframe>
        </div>
    </div>
    @endif
</div>
