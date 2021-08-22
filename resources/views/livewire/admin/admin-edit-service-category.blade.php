<div>
    <div>
        <div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Update Service Category</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Update Service Category</li>
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
                                                <h4>Update Service Category</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4>
                                                    <a href="{{route('admin.service_categories')}}"
                                                        class="btn btn-success pull-right">All Service Category</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @if (session()->has('message'))
                                            <div class="alert alert-success">{{session('message')}}</div>
                                        @endif
                                        <form action="" method="post"
                                            wire:submit.prevent="updateCategory()">
                                            @csrf
                                            <div class="form-horizontal">
                                                <div class="form-group ">
                                                    <label for="name" class="control-label col-sm-3">Category Name</label>
                                                    <div class="form-group col-md-9">
                                                        <input type="text" class="form-control" id="name"
                                                            name="name"   wire:model="name" wire:keyup='generateSlug()'>
                                                        @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="featured" class="control-label col-sm-3">Featured</label>
                                                    <div class="form-group col-md-9">
                                                        <select class="form-control" id="featured"
                                                            wire:model="featured"  name="featured">
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="slug" class="control-label col-sm-3">Category Slug</label>
                                                    <div class="form-group col-md-9">
                                                        <input type="text" class="form-control" id="slug"
                                                            wire:model="slug" name="slug">
                                                            @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="newimage" class="control-label col-sm-3">Category Image</label>
                                                    <div class="form-group col-md-9">
                                                        <input type="file" class="form-control-file" id="newimage"
                                                            name="newimage" wire:model="newimage">
                                                            @error('newimage') <p class="text-danger">{{$message}}</p> @enderror
                                                            @if ($newimage)
                                                                <img src="{{$newimage->temporaryUrl()}}" width="60" alt="">
                                                            @else
                                                                <img src="{{asset('images/categories')}}/{{$image}}" width="60" alt="">
                                                            @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-offset-3">
                                                    <button class="btn btn-success">Update</button>
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
