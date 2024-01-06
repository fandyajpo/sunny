@extends('layouts.app')

@section('content')
<div>


  <div class="flex flex-col pt-4">
    <label class="text-xl font-semibold text-black">Changes log</label>
  </div>

  <table class="table-auto w-full">
    <thead>
      <tr>
        <th class="text-left">Message</th>
        <th class="text-left">Created At</th>
      </tr>
    </thead>
    <hr class="my-4" />
    <tbody>
      @foreach ($data as $d)
      <tr>
        <td>{{ $d->message }} {{ $d->name }}</td>
        <td>{{ $d->created_at }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
<div>

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
        `http://localhost:8001/category/${id}`, {
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
</script>


@endsection