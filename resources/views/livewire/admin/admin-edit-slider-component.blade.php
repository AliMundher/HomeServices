<div>
    <div>
        <div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Edit Slider</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Edit Slider</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-central">
            <div class="content_info">
                <div class="paddings-mini">
                    <div class="container">
                        <div class="row portfolioContainer ">
                            <div class="col-md-8 col-md-offset-2 profile1">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>Edit Slider</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4>
                                                    <a href="{{route('admin.slider')}}"
                                                        class="btn btn-success pull-right">All Slider</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @if (session()->has('message'))
                                            <div class="alert alert-success">{{session('message')}}</div>
                                        @endif
                                        <form method="post" wire:submit.prevent="updateSlider()">
                                            @csrf
                                            <div class="form-horizontal">
                                                <div class="form-group ">
                                                    <label for="title" class="control-label col-sm-3">Title</label>
                                                    <div class="form-group col-md-9">
                                                        <input type="text" class="form-control" id="title"
                                                            name="title"   wire:model="title" >
                                                        @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status" class="control-label col-sm-3">Status</label>
                                                    <div class="form-group col-md-9">
                                                        <select name="status" wire:model="status" class="form-control">
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                        @error('status') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="newImage" class="control-label col-sm-3">Image</label>
                                                    <div class="form-group col-md-9">
                                                        <input type="file" class="form-control-file" id="newImage"
                                                            name="newImage" wire:model="newImage">
                                                            @error('newImage') <p class="text-danger">{{$message}}</p> @enderror
                                                            @if ($newImage)
                                                                <img src="{{$newImage->temporaryUrl()}}" width="60" alt="">
                                                            @else
                                                                <img src="{{asset('images/slider')}}/{{$image}}" width="60" alt="">
                                                            @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-offset-3">
                                                    <button class="btn btn-success">Update Slider</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>
