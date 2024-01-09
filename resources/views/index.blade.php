@extends('layouts.app')
@section('content')
<div>
    <div>

        <form method="POST" id="barangForm" action="/barang/" class="grid grid-cols-2 gap-2 justify-center py-12 px-4">
            @csrf
            @method("POST")
            <div class="flex flex-col">
                <label>Nama Barang</label>
                <input id="name" name="name" placeholder="Nama Barang" required type="text" class="border h-10 border-gray-300 rounded shadow px-2" />
            </div>
            <div class="flex flex-col">
                <label>Deskripsi Barang</label>
                <input id="description" name="description" placeholder="Deskripsi Barang" required type="text" class="border h-10 border-gray-300 rounded shadow px-2" />
            </div>
            <div class="flex flex-col">
                <label>Harga Barang</label>
                <input id="price" name="price" placeholder="Harga Barang" required type="number" class="border h-10 border-gray-300 rounded shadow px-2" />
            </div>
            <div class="flex flex-col">
                <label>Stock</label>
                <input id="stock" name="stock" placeholder="Stock" required type="number" class="border h-10 border-gray-300 rounded shadow px-2" />
            </div>
            <div class="flex flex-col">
                <label>Kategori Barang</label>
                <select id="category" name="category" class="border border-gray-400 rounded-md w-full p-2">
                    @foreach ($category as $d)
                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col">
                <label>Supplier Barang</label>
                <select id="supplier" name="supplier" class="border border-gray-400 rounded-md w-full p-2">
                    @foreach ($supplier as $d)
                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col">
                <label class="invisible">.</label>
                <div class="w-full flex gap-2">
                    <button type="button" id="cancelUpdate" style="display: none;" class="bg-blue-500 h-10 rounded text-white w-full">
                        Cancel
                    </button>
                    <button type="submit" class="bg-blue-500 h-10 rounded text-white w-full">
                        Submit
                    </button>
                </div>
            </div>
        </form>
        <div class="px-4">
            <div class="bg-blue-500 p-4 w-fit  text-white rounded-md">
                <a href="{{ URL::to('/summary') }}">Export PDF</a>
            </div>
            <hr class="mt-4" />
        </div>
    </div>
</div>
<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5  gap-4 px-4 pt-6">
        @foreach ($data as $d)
        <article class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow">
            <div class="p-4 sm:p-6">
                <p datetime="2022-10-10" class="block text-xs text-gray-500">{{ $d->created_at }}</p>
                <h3 class="text-lg font-medium text-gray-900">
                    {{ $d->name }}
                </h3>
                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                    Category : {{ $d->CategoryRelationship->name ?? 'No category' }}
                </p>
                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                    Supplier : {{ $d->SupplierRelationship->name ?? 'No Supplier' }}
                </p>
                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                    Stock : {{ $d->stock }}
                </p>
                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                    Harga : {{ $d->price }}
                </p>
                <div class="flex gap-4">
                    <button onclick="update('{{ $d->id }}','{{ $d->name }}','{{ $d->description }}','{{ $d->price }}','{{ $d->stock }}','{{ $d->CategoryRelationship->id ?? `No category` }}','{{ $d->SupplierRelationship->id ?? `No Supplier` }}')" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
                        Edit
                    </button>
                    <button onclick="del('{{ $d->id }}','{{ $d->name }}')" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-red-600">
                        Remove
                    </button>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</div>

<script>
    async function del(id, name) {
        const sure = confirm(`Yakin mau hapus? ${name}`)
        if (!sure) return;

        try {
            const csrfToken = document.querySelector(
                'meta[name="csrf-token"]'
            ).content;
            const request = await fetch(
                `http://localhost:8000/barang/${id}`, {
                    method: "DELETE",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken,
                    },
                }
            );
            return window.location.reload();
        } catch (error) {
            return error;
        }
    }

    function update(id, name, description, price, stock, category, supplier) {
        document.querySelector('input[name="_method"]').value = 'PATCH'
        document.getElementById("cancelUpdate").style.display = "block"
        document.getElementById("name").value = name;
        document.getElementById("description").value = description;
        document.getElementById("price").value = price;
        document.getElementById("stock").value = stock;
        document.getElementById("category").value = category;
        document.getElementById("supplier").value = supplier;

        // SET THE ROUTE TO UPDATE API
        const form = document.getElementById("barangForm");
        return form.action = `/barang/${id}/`;
    }

    document.getElementById("cancelUpdate").addEventListener("click", () => {
        document.querySelector('input[name="_method"]').value = 'POST'
        document.getElementById("name").value = "";
        document.getElementById("description").value = "";
        document.getElementById("price").value = 0;
        document.getElementById("stock").value = 0;
        document.getElementById("category").value = "";
        document.getElementById("supplier").value = "";
        document.getElementById("cancelUpdate").style.display = "none"

        // SET THE ROUTE TO INSERT API
        const form = document.getElementById("barangForm").form.action = `/jadwal/`;
        form.action = `/barang/`;

    })
</script>

</html>
@endsection