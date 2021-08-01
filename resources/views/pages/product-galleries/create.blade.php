@extends('layouts.default')

@section('title', 'Tambah Foto')
    
@section('content')

<div class="card">
    <div class="card-header">
        <strong>Tambah Foto Barang</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="form-control-label">Nama Barang</label>
            <select name="products_id" class="form-control @error('products_id') is-invalid @enderror">
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
            </select>
            @error('products_id') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="photo" class="form-control-label">Foto Barang</label>
            <input type="file" name="photo" value="{{ old('photo') }}" accept="image/*" class="form-control @error('type') is-invalid @enderror" required>
            @error('photo') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="is_default" class="form-control-label">Default</label><br>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_default" id="is_default" value="1">
                <label class="form-check-label" for="is_default">
                  Ya
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="is_default" id="is_default" value="0" checked>
                <label class="form-check-label" for="is_default">
                  Tidak
                </label>
              </div>
            @error('quantity') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-block" type="submit">Tambah Foto Barang</button>
        </div>
        </form>
    </div>
</div>

@endsection

