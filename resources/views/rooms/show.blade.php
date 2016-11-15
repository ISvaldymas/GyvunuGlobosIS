@extends('KambariuRezervacija.Layout.main')

@section('title','|Peržiūrėti kambarį')

@section('width') <div class="col-md-12"> @endsection

@section('content')



  <div class="row">
    <div class="col-md-10">
      <h1>Kambariai</h1>
    </div>

    <div class="col-md-2">
      <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Redaguoti</a>
     {!! Form::open(['route' => ['rooms.destroy', $room->id], 'method' => 'DELETE'])!!}
    

      {!! Form::submit('Pašalinti', ['class' => 'btn btn-lg btn-block btn-primary btn-h1-spacing','style' => 'margin-top:15px;'])!!}

  {!! Form::close() !!}
     
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div> <!-- end of .row -->

<div class="col-md-12 well">
  <div class="col-md-6 well">
      <h1>Kambario informacija</h1>
      <hr>
		<h3>Kambario numeris: <small>{{ $room->number }}</small></h3>
		    @if($room->room_type_fk  == '0')
    <h3>Kambario tipas: <small>Vienvietis</small></h3>
    @elseif($room->room_type_fk  == '1')
     <h3>Kambario tipas: <small>Dvivietis</small></h3>
    @elseif($room->room_type_fk  == '2')
     <h3>Kambario tipas: <small>Trivietis</small></h3>
    @else
     <h3>Kambario tipas: <small>Keturvietis</small></h3>
     @endif
		<h3>Kambario kaina: <small>{{ $room->price }} eur.</small></h3>
		<h3>Kambario aprašymas: <small>{{ $room->body }}</small></h3>

      
  </div>
  <div class="col-md-6 well">
      <h1>Kambario nuotrauka</h1>
      <hr>
    <div class="my-slider">
<ul>
    @if($room->photo_fk != NULL)
        <li><img src="{{ asset($room->photo_fk) }}" width="650" height="450" alt="Avatar" id="avatar_show" class="img-thumbnail" />
        </li>
    @else
        <li><img src="/Style/Images/avatar2.jpg" width="650" height="450" alt="Avatar" id="avatar_show" class="img-thumbnail" />
        </li>
    @endif
</ul>
 
    </div>
</div>
  </div>
  </div>
        <td><a href="{{ route('rooms.index', $room->id) }}" class="btn btn-primary btn-lg">Atgal</a></td>


  <div class="row">
    <div class="col-md-8" style="margin-top: 20px;">
<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>{{ $room->rate()->count() }} Komentarai</h3>

      @foreach($room->rate as $comment)
        <div class="comment" style="margin-top: 45px;">
        <div class="author-info">
        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image">
        <div class="author-name">
        <h4>{{$comment->name}}</h4>
        <p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
            </div>

          </div>

          <div class="comment-content">
            {{ $comment->comment }}
          </div>

        </div>
      @endforeach
        </div>
  </div>
    

  <div class="row">
    <div id="comment-form" class="col-md-8" style="margin-top: 50px;">
      {{ Form::open(['route' => ['rate.store', $room->id], 'method' => 'POST']) }}

        <div class="row">
          <div class="col-md-6">
            {{ Form::label('name', "Vardas:") }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
          </div>

          <div class="col-md-6">
            {{ Form::label('email', 'El.paštas:') }}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
          </div>

          <div class="col-md-12">
            {{ Form::label('comment', "Komentaras:") }}
            {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

            <div class="col-md-12">
           {{ Form::submit('Vertinti', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
          </div>
        

      {{ Form::close() }}
    
  </div>
     
@endsection
@section('scripts')
  <script src="/Style/Js/Image_upload.js"></script>
@endsection

