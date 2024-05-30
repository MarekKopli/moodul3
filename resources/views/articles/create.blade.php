@extends('partials.layout')

@section('content')
    <div class="container mx-auto w-1/2">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Title</span>

                        </label>
                        <input name="title" type="text" placeholder="Article Title" class="input input-bordered w-full @error('title') input-error @enderror"/>
                        @error('title')
                            <label class="label">
                                <span class="label-text-alt text-error">{{$message}}</span>

                            </label>
                        @enderror
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Content</span>
                        </label>
                        <textarea name="body" class="textarea textarea-bordered @error('title') textarea-error @enderror" placeholder="Content here"></textarea>
                        @error('body')
                            <label class="label">
                                <span class="label-text-alt text-error">{{$message}}</span>
                            </label>
                        @enderror
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Dietary Preferences</span>
                        </label>
                        <div class="flex space-x-4">
                            <label class="cursor-pointer">
                                <input type="checkbox" name="vegan" class="checkbox checkbox-primary" value="1"/>
                                <span class="label-text ml-2">Vegan</span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="checkbox" name="gluten_free" class="checkbox checkbox-primary" value="1"/>
                                <span class="label-text ml-2">Gluten Free</span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="checkbox" name="vegetarian" class="checkbox checkbox-primary" value="1"/>
                                <span class="label-text ml-2">Vegetarian</span>
                            </label>
                        </div>
                        @error('vegan')
                            <label class="label">
                                <span class="label-text-alt text-error">{{$message}}</span>
                            </label>
                        @enderror
                        @error('gluten_free')
                            <label class="label">
                                <span class="label-text-alt text-error">{{$message}}</span>
                            </label>
                        @enderror
                        @error('vegetarian')
                            <label class="label">
                                <span class="label-text-alt text-error">{{$message}}</span>
                            </label>
                        @enderror
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Spiciness Level</span>
                        </label>
                        <select name="spiciness" class="select select-bordered w-full @error('spiciness') select-error @enderror">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        @error('spiciness')
                            <label class="label">
                                <span class="label-text-alt text-error">{{$message}}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Price</span>
                        </label>
                        <input name="price" type="number" step="0.01" placeholder="Price" class="input input-bordered w-full @error('price') input-error @enderror"/>
                        @error('price')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Images</span>
                        </label>
                        <input name="images[]" type="file" multiple class="file-input input-bordered w-full @error('images.*') input-error @enderror" accept="image/*"/>
                        @error('images.*')
                            <label class="label">
                                <span class="label-text-alt text-error">{{$message}}</span>
                            </label>
                        @enderror
                    </div>
                    <input type="submit" value="Create" class="btn btn-primary mt-3">
                </form>
            </div>
        </div>
    </div>
@endsection
