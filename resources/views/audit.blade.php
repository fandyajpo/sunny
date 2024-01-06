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


@endsection