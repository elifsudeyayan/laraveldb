@extends('backend.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Slider</h4>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                    @endforeach
                @endif
                @if (session()->get('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif


                @if (!empty($slider->id))
                @php
                        $routelink = route('panel.slider.update',$slider->id);

                @endphp
                @else
                    @php
                        $routelink = route('panel.slider.store');
                    @endphp
                @endif

               {{--<form action="{{$routelink}}" class="forms-sample" method="POST" enctype="multipart/form-data">--}}
                <form action="{{$routelink}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (!empty($slider->id))
                        @method('PUT')
                    @endif



                <div class="form-group">
                    <div class="input-group col-xs-12">
                        <img src="{{ asset($slider->image ?? 'img/slider/resimyok') }}" alt="">
                    </div>
                </div>

                <div class="form-group">
                    <label>Resim</label>
                    <input type="file" name="image" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div>

              <div class="form-group">
                <label for="name">Başlık</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$slider->name ?? ''}}" placeholder="Slider Başlık">
              </div>
              <div class="form-group">
                <label for="slogan">Slogan</label>
                <textarea class="form-control" id="slogan" name="content" placeholder="Slider Slogan" rows="3">{!! $slider->content ?? '' !!}</textarea>
              </div>
              <div class="form-group">
                <label for="link">Link</label>
                <input type="text" class="form-control" id="link" name="link" value="{{$slider->link ?? ''}}" placeholder="Slider link">
              </div>

              <div class="form-group">
                <label for="durum">Durum</label>
                @php
                  $status =  $slider->status ?? '1';
                @endphp
                <select name="status" id="status" class="form-control">
                    <option value="0" {{$status == '0' ? 'selected' : ''}}>Pasif</option>
                    <option value="1" {{$status == '1' ? 'selected' : ''}}>Aktif</option>
                </select>
              </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection

{{--@extends('backend.layout.app')

@section('content')

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Slider Ekle</h4>
            <form  action="{{route('panel.slider.store')}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Resim</label>
                    <input type="file" name="image" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div>
            </form>
              <div class="form-group">
                <label for="name">Başlık</label>
                <input type="text" class="form-control" id="exampleInputName1"  name ="name" placeholder="Slider Başlık">
              </div>
              <div class="form-group">
                <label for="slogan">Slogan</label>
                <textarea type="text" class="form-control" id="slogan"  name ="content" placeholder="Slider Slogan"> </textarea>
              </div>
              <label for="name">Link</label>
              <input type="text" class="form-control" id="link"  name ="link" placeholder="Slider link">
            </div>
        </div>

              <div class="form-group">
              <label for="name">Durum</label>
             <select name="status" id="status" class="form-control">
                <option value="0">Pasif</option>
                <option value="1" selected>Aktif</option>
             </select>
              </div>
    </div>
              {{--<div class="form-group">
                <label for="exampleInputCity1">City</label>
                <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Textarea</label>
                <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
              </div>



              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
</div> --}}






























{{--@extends('backend.layout.app')

@section('content')

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Slider</h4>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @php
                    $routelink = !empty($slider->id) ? route('panel.slider.update', $slider->id) : route('panel.slider.store');
                @endphp

                <form action="{{ $routelink }}" class="forms-sample" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (!empty($slider->id))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <div class="input-group col-xs-12">
                            <img src="{{ asset($slider->image ?? 'img/slider/resimyok') }}" alt="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Resim</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Başlık</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{ $slider->name ?? '' }}" placeholder="Slider Başlık">
                    </div>

                    <div class="form-group">
                        <label for="slogan">Slogan</label>
                        <textarea class="form-control" id="slogan" name="content" placeholder="Slider Slogan" rows="3">{{ $slider->content ?? '' }}</textarea>
                    </div>

                    <label for="name">Link</label>
                    <input type="text" class="form-control" id="link" name="link" value="{{ $slider->link ?? '' }}"  placeholder="Slider link">

                    <div class="form-group">
                        <label for="name">Durum</label>
                        <div class="form-group">


                        @php
                            $status = $slider->status ?? '1';
                        @endphp
                        <select name="status" id="status" class="form-control">
                            <option value="0" {{ $status == '0' ? 'selected' : '' }}>Pasif</option>
                            <option value="1" {{ $status == '1' ? 'selected' : '' }}>Aktif</option>
                        </select>
                    </div>

                     Diğer form alanları eklenebilir

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}


