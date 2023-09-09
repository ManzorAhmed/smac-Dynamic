@php
    $gallery=\App\Models\Gallery::get();
@endphp
{{--<section id="supporters" class="section-with-bg">--}}

{{--    <div class="container" data-aos="fade-up">--}}
{{--        <div class="section-header">--}}
{{--            <h2 class="#" style="font-family: Montserrat, sans-serif;color: #EE0A0A; padding-top: 10px;">Our Latest--}}
{{--                Project</h2>--}}
{{--        </div>--}}

{{--        <div class="row no-gutters supporters-wrap clearfix" data-aos="zoom-in" data-aos-delay="100">--}}
{{--            @foreach($gallery as $r)--}}
{{--                <div class="col-lg-3 col-md-4 col-xs-8">--}}
{{--                    <div class="supporter-logo">--}}
{{--                        <img src="{{asset('uploads/gallery/'.$r->image)}}" class="img-fluid" alt=""/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

{{--    </div>--}}

{{--</section>--}}


<div class="container">
    <div class="row py-3">
        <h2 class="text-center" style="font-family: Montserrat, sans-serif;color: #EE0A0A; padding-top: 10px;">Our Latest
                            Project</h2>
        @foreach($gallery as $r)
            <div class="col-md-3 col-sm-4 col-6 py-2">
                <a href="#galleryModal" data-large-src="{{asset('uploads/gallery/'.$r->image)}}" data-toggle="modal">
                    <img src="{{asset('uploads/gallery/'.$r->image)}}" class="img-fluid img-thumbnail">
                </a>
            </div>
        @endforeach
    </div>
</div>

<div id="galleryModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center mb-0"></h3>
                <button type="button" class="close float-right" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">&#xD7;</span>
                </button>
            </div>
            <div class="modal-body p-0 text-center bg-alt">
                <img src="{{asset('uploads/gallery/'.$r->image)}}"  id="galleryImage"
                     class="loaded-image mx-auto img-fluid">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">OK</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#galleryModal').on('show.bs.modal', function (e) {
        $('#galleryImage').attr("src",$(e.relatedTarget).data("large-src"));
    });
</script>








