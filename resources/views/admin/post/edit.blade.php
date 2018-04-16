@extends('layouts.admin.master')

@section('head')
<link rel="stylesheet" href="{{url('admin_assets/bower_components/bootstrap-fileinput-master/css/fileinput.min.css')}}">
<link rel="stylesheet" href="{{url('admin_assets/bower_components/bootstrap-tagsinput-master/src/bootstrap-tagsinput.css')}}">
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-address-card"><i class="text-uppercase"> &nbsp;Post Management</i></i>
            
            {{-- <small>advanced tables</small> --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="#">Post</a></li>
            <li class="active">Edit Post</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b><i><u>Edit Post</u></i></b></h3>
                <a class="fa fa-arrow-left" style="float: left;" href="{{ route('admin.posts.list') }}"></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <form action="{{ route('posts.update') }}" method="POST" enctype="multipart/form-data" id="post-update">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$post->id}}">
                    <div class="portlet-body">
                        @if (count($post)>0)
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="">Tiêu đề (<span style="color: red">*</span>)</label>
                                    <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$post->title}}">
                                    @if ($errors->has('title'))
                                    <span class="errors">{{$errors->first('title')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Tóm tắt (<span style="color: red">*</span>)</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="4" placeholder="Description">{{$post->description}}</textarea> 
                                    @if ($errors->has('description'))
                                    <span class="errors">{{$errors->first('description')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Nội dung (<span style="color: red">*</span>)</label>
                                    <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Content">{{$post->content}}</textarea> 
                                    @if ($errors->has('content'))
                                    <span class="errors">{{$errors->first('content')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                {{-- categories --}}
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-list font-green" aria-hidden="true"></i>
                                            <span class="caption-subject font-green bold">Danh mục</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <select class="form-control" name="category_id">
                                            @if (count($categories)>0) @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{($category->id==$post->category_id)?'selected':''}}>{{$category->name}}</option>
                                            @endforeach @endif
                                        </select>
                                        @if ($errors->has('categories'))
                                        <span class="errors">{{$errors->first('categories')}}</span>
                                        @endif
                                    </div>
                                </div>

                                {{-- featured image  --}}
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-picture-o font-green" aria-hidden="true"></i>
                                            <span class="caption-subject font-green bold">Ảnh thumbnail</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">

                                       <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 250px; height: 200px;">
                                            @if(empty($post->thumbnail))
                                            <img id="previewimg" src="{{url('images/no-image.png')}}" alt="No Image" />
                                            @else
                                            <img id="previewimg" src="{{asset($post->thumbnail)}}" alt="No Image" />
                                            @endif 
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 200px;"> </div>
                                        <div style="margin-top: 10px;">
                                            <span class="input-group-btn">
                                              <a id="lfm" data-input="thumbnail" data-preview="previewimg" class="btn btn-primary">
                                                <input type="file" name="thumbnail">
                                            </a>
                                        </span>
                                        @if ($errors->has('thumbnail'))
                                        <span class="errors">{{$errors->first('thumbnail')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Tags --}}
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-tags font-green" aria-hidden="true"></i>
                                    <span class="caption-subject font-green bold">Tags</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                               <div class="form-group">
                                <select multiple name="tags[]" id="tags" data-role="tagsinput">
                                    @if(count($post->tags) > 0) @foreach($post->tags as $tag) 
                                    <option value="{{$tag->name}}">{{$tag->name}}</option>
                                    @endforeach @endif
                                </select>
                                @if ($errors->has('tags'))
                                <span class="errors">{{$errors->first('tags')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-tags font-green" aria-hidden="true"></i>
                                <span class="caption-subject font-green bold">Hành động</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                           <div class="form-group">
                            <button type="submit" id="add-post" class="btn btn-sm green btn-circle" style="width: 40%"> Lưu </button>                               
                            <input type="reset" class="btn btn btn-sm btn-circle" style="width: 40%" value="Nhập lại">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</form>
</div>

@endsection

@section('js.section')

<script src="{{asset('admin_assets/bower_components/tinymce/js/tinymce/tinymce.min.js')}}"></script>

<script src="{{url('admin_assets/bower_components/prism-gh-pages/prism.js')}}"></script>

<script src="{{url('admin_assets/bower_components/bootstrap-fileinput-master/js/fileinput.min.js')}}"></script>

<script src="{{url('admin_assets/bower_components/bootstrap-tagsinput-master/dist/bootstrap-tagsinput.min.js')}}"></script>

<script>

    tinymce.init({
        selector: '#content',
        height: 500,
        theme: 'modern',
        menubar: false,
        autosave_ask_before_unload: false,
        plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern codesample"
        ],
        toolbar1: "newdocument | forecolor backcolor cut copy paste bullist numlist bold italic underline strikethrough| alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect  | searchreplace  | outdent indent | undo redo | link unlink anchor code | insertdatetime preview | table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | codesample",
        image_advtab: true,
        content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
        ],
        setup: function (ed) {
            ed.on('init', function (e) {
                ed.execCommand("fontName", false, "Tahoma");
            });
        },
        relative_urls: false,
        remove_script_host : false,
        file_browser_callback : function(field_name, url, type, win) {
          var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
          var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

          var cmsURL = route_prefix + '?field_name=' + field_name;
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Image manager',
            width : x * 0.9,
            height : y * 0.9,
            resizable : "yes",
            close_previous : "no"
        });
    }
});

    $('#post-update').on('keyup keypress', function(e) {
      var keyCode = e.keyCode || e.which;
      if (keyCode === 13) { 
        e.preventDefault();
        return false;
    }
});
</script>

@endsection