@extends('layouts.app')

@section('content')
<div>
  <div>
    <form method="POST" id="categoryForm" action="/category" class="grid grid-cols-2 gap-2 justify-center py-12 px-4">
      @csrf
      @method("POST")
      <div class="flex flex-col">
        <label>Category Name</label>
        <input id="name" placeholder="Category Name" name="name" required type="text" class="border h-10 border-gray-300 rounded shadow px-2" />
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
    <hr />
  </div>
</div>
<div>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5  gap-4 px-4 pt-6">
    @foreach ($data as $d)
    <article class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow">
      <div class="p-4 sm:p-6">
        <p datetime="2022-10-10" class="block text-xs text-gray-500"> {{ $d->created_at }}</p>
        <h3 class="text-lg font-medium text-gray-900">
          {{ $d->name }}
        </h3>

        <div class="flex gap-4">
          <button onclick="update('{{ $d->id }}','{{ $d->name }}')" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
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
  async function del(id, title) {
    const sure = confirm(`Yakin mau hapus? ${title}`)
    if (!sure) return;
    try {
      document.querySelector('input[name="_method"]').value = 'DELETE'
      const csrfToken = document.querySelector(
        'meta[name="csrf-token"]'
      ).content;
      const request = await fetch(
        `http://localhost:8000/category/${id}`, {
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

  function update(id, name) {
    document.querySelector('input[name="_method"]').value = 'PATCH'
    document.getElementById("cancelUpdate").style.display = "block"
    document.getElementById("name").value = name;
    // SET THE ROUTE TO UPDATE API
    const form = document.getElementById("categoryForm");
    return form.action = `/category/${id}/`;
  }

  document.getElementById("cancelUpdate").addEventListener("click", () => {
    document.querySelector('input[name="_method"]').value = 'POST'
    document.getElementById("name").value = "";
    document.getElementById("cancelUpdate").style.display = "none"

    // SET THE ROUTE TO INSERT API
    const form = document.getElementById("categoryForm");
    form.action = `/category/`;

  })
</script>


@endsection