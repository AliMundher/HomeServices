<div>
    <div>
        <div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Add New Service</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Add New Service</li>
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
                                                <h4>Add New Service</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4>
                                                    <a href="{{route('admin.all_services')}}"
                                                        class="btn btn-success pull-right">All Service</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @if (session()->has('message'))
                                            <div class="alert alert-success">{{session('message')}}</div>
                                        @endif
                                        <form method="post" wire:submit.prevent="createService()">
                                            @csrf
                                            <div class="form-horizontal">
                                                <div class="form-group ">
                                                    <label for="name" class="control-label col-sm-3">Name</label>
                                                    <div class="form-group col-md-9">
                                                        <input type="text" class="form-control" id="name"
                                                            name="name"  wire:model="name" wire:keyup='generateSlug()'>
                                                        @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="slug" class="control-label col-sm-3">Slug</label>
                                                    <div class="form-group col-md-9">
                                                        <input type="text" class="form-control" id="slug"
                                                            wire:model="slug" name="slug">
                                                            @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tagline" class="control-label col-sm-3">Tag Line</label>
                                                    <div class="form-group col-md-9">
                                                        <input type="text" class="form-control" id="tagline"
                                                            wire:model="tagline" name="tagline">
                                                            @error('tagline') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tagline" class="control-label col-sm-3">Service Category</label>
                                                    <div class="form-group col-md-9">
                                                        <select name="" id="" class="form-control" wire:model="service_category_id">
                                                            <option value="">Select Service Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{$category->id}}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                            @error('service_category_id') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="price" class="control-label col-sm-3">Price</label>
                                                    <div class="form-group col-md-9">
                                                        <input type="text" class="form-control" id="price"
                                                            wire:model="price" name="price">
                                                            @error('price') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="discount" class="control-label col-sm-3">Discount</label>
                                                    <div class="form-group col-md-9">
                                                        <input type="text" class="form-control" id="discount"
                                                            wire:model="discount" name="discount">
                                                            @error('discount') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="discount_type" class="control-label col-sm-3">Discount Type</label>
                                                    <div class="form-group col-md-9">
                                                        <select class="form-control" id="discount_type"
                                                            wire:model="discount_type"  name="discount_type">
                                                            <option value="fixed">Fixed</option>
                                                            <option value="percent">Percent</option>
                                                        </select>
                                                            @error('discount_type') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description" class="control-label col-sm-3">Description</label>
                                                    <div class="form-group col-md-9">
                                                        <textarea  class="form-control" id="description"
                                                            wire:model="description" name="description">
                                                        </textarea>
                                                            @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inclusion" class="control-label col-sm-3">Inclusion</label>
                                                    <div class="form-group col-md-9">
                                                        <input type="text" class="form-control" id="inclusion"
                                                            wire:model="inclusion" name="inclusion">
                                                            @error('inclusion') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exclusion" class="control-label col-sm-3">Exclusion</label>
                                                    <div class="form-group col-md-9">
                                                        <input type="text" class="form-control" id="exclusion"
                                                            wire:model="exclusion" name="exclusion">
                                                            @error('exclusion') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="thumbnail" class="control-label col-sm-3">Thumbnail</label>
                                                    <div class="form-group col-md-9">
                                                        <input type="file" class="form-control-file" id="thumbnail"
                                                            name="thumbnail" wire:model="thumbnail">
                                                            @error('thumbnail') <p class="text-danger">{{$message}}</p> @enderror
                                                            @if ($thumbnail)
                                                                <img src="{{$thumbnail->temporaryUrl()}}" width="60" alt="">
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image" class="control-label col-sm-3">Image</label>
                                                    <div class="form-group col-md-9">
                                                        <input type="file" class="form-control-file" id="image"
                                                            name="image" wire:model="image">
                                                            @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                                            @if ($image)
                                                                <img src="{{$image->temporaryUrl()}}" width="60" alt="">
                                                            @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-offset-3">
                                                    <button class="btn btn-success">Create Service</button>
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
