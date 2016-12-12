@extends('KambariuRezervacija.Layout.main')

@section('title','|Peržiūrėti kambarį')

@section('width') <div class="col-md-12"> @endsection

@section('content')



  <div class="row">
    <div class="col-md-10">
      <h1>Kambarys</h1>
    </div>

    <div class="col-md-2">
      @if(Auth::check())
      @if( Auth::user()->Role->id == 1)
      <a href="{{ route('rooms.edit', $data['room'] -> id) }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Redaguoti</a>
     {!! Form::open(['route' => ['rooms.destroy', $data['room'] -> id], 'method' => 'DELETE'])!!}
     {!! Form::submit('Pašalinti', ['class' => 'btn btn-lg btn-block btn-primary btn-h1-spacing','style' => 'margin-top:15px;'])!!}
     {!! Form::close() !!}
     @endif
     @endif
     
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div> <!-- end of .row -->

<div class="col-md-12 well">
  <div class="col-md-6 well">
      <h1>Kambario informacija</h1>
      <hr>
    <h3>Kambario numeris: <small>{{ $data['room']->number }}</small></h3>
        @if($data['room']->room_type_fk  == '0')
    <h3>Kambario tipas: <small>Vienvietis</small></h3>
    @elseif($data['room']->room_type_fk  == '1')
     <h3>Kambario tipas: <small>Dvivietis</small></h3>
    @elseif($data['room']->room_type_fk  == '2')
     <h3>Kambario tipas: <small>Trivietis</small></h3>
    @else
     <h3>Kambario tipas: <small>Keturvietis</small></h3>
     @endif
    <h3>Kambario kaina: <small>{{ $data['room']->price }} €</small></h3>
    <h3>Kambario aprašymas: <small>{{ $data['room']->body }}</small></h3>
 <div>
        
        @foreach($data['catt'] as $type)  
        @endforeach
        <h3>Kambario patogumai:<small>
        @if($data['cat1'] != NULL )
        @foreach($data['cat1'] as $types)
           @if( $data['room']->id == $types->room_id) 
               @foreach($data['catt'] as $type) 
                  @if ($types -> amenity_id == $type -> id )
                      <span class="glyphicon glyphicon-ok icon-success2"></span> {{ $type -> name }}</span>  
                  @endif
                @endforeach
          @endif
        @endforeach
        @endif
        <small></h3>
       
 </div>
<div class="comment" type=number step=0.01>
     <h3>Kambario įvertinimas: <small>{{ round($data['average']) }}/5</small>
@if(round($data['average']) == 0)
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>        
@endif
@if(round($data['average']) == 1)
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>        
@endif
@if(round($data['average']) == 2)
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>        
@endif
@if(round($data['average']) == 3)
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>        
@endif
@if(round($data['average']) == 4)
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>        
@endif
@if(round($data['average']) == 5)
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>        
@endif

</div>
  </div>
  <div class="col-md-6 well">
      <h1>Kambario nuotrauka</h1>
      <hr>
    <div class="my-slider">
<ul>
    @if($data['room']->photo_fk != NULL)
        <li><img src="{{ asset($data['room']->photo_fk) }}" width="650" height="450" alt="Avatar" id="avatar_show" class="img-thumbnail" />
        </li>
    @else
        <li><img src="/Style/Images/avatar2.jpg" width="650" height="450" alt="Avatar" id="avatar_show" class="img-thumbnail" />
        </li>
    @endif
</ul>
    </div>

</div>
        <td><a href="{{ route('rooms.index', $data['room']->id) }}" class="btn btn-primary btn-lg" style="float: right;">    Atgal į sąrašą   </a></td>

  </div>
  </div>



  <div class="row">
    <div class="col-md-8" style="margin-top: 20px;">
<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>{{ $data['room']->rate()->count() }} Komentarai</h3>
@if(Auth::check())
@else
<div class="comment-content">Norint peržiūrėti komenterus/ įvertinti kambrį - prisijunkite!</div>
@endif

           @foreach($data['room']->rate as $comment)
        <div class="comment" style="margin-top: 45px;">
        <div class="author-info">

              @if($comment->photo_fk == 0)
                    <img src="/Style/Images/avatar.jpg" class="author-image" alt="">
                  @else
                    @foreach($data['foto'] as $photo)
                    @if($comment->photo_fk == $photo->id)
                    <img src="/{{$photo->url}}" class="author-image" alt="">
                    @endif
                   @endforeach
              @endif
              
        <div class="author-name">
        <h4>{{$comment->name}}</h4>
        <p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
            </div>

          </div>

          <div class="comment-content">
            {{ $comment->comment }}
   <div>        
@if($comment->value_id == 0)
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>        
@endif
@if($comment->value_id == 1)
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>        
@endif
@if($comment->value_id == 2)
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>        
@endif
@if($comment->value_id == 3)
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>        
@endif
@if($comment->value_id == 4)
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star-empty icon-success"></span>        
@endif
@if($comment->value_id == 5)
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>
                  <span class="glyphicon glyphicon-star icon-success"></span>        
@endif
</div>
          </div>

        </div>
@endforeach
        </div>
  </div>
    

  <div class="row">
    <div id="comment-form" class="col-md-8" style="margin-top: 50px;">
      {{ Form::open(['route' => ['rate.store', $data['room']->id], 'method' => 'POST']) }}
@if(Auth::check())
@if(Auth::user()->information_fk > 0)

        <div class="row">
          <div class="col-md-6">
            {{ Form::label('name', "Vardas:") }}
           <input autofocus type="text" name="name" class="form-control" id="name" value="{{ Auth::user()->user_information->name }}" readonly>

          </div>

          <div class="col-md-6">
            {{ Form::label('email', 'El.paštas:') }}
             <input autofocus type="text" name="email" class="form-control" id="name" value="{{ Auth::user()->email }}" readonly>
          </div>

          <div class="col-md-12">
            {{ Form::label('comment', "Komentaras:") }}
            {{ Form::textarea('comment', null, ['class' => 'form-control', 'required' => '', 'rows' => '5']) }}

       <div class="col-md-6">
        {{ Form::label('value_id','Įvertinimas:') }}
  <span class=" glyphicon glyphicon-star icon-success">{{ Form::radio('value_id', '1') }}</span>
  <span class=" glyphicon glyphicon-star icon-success">{{ Form::radio('value_id', '2') }}</span>   
  <span class=" glyphicon glyphicon-star icon-success">{{ Form::radio('value_id', '3') }}</span> 
  <span class=" glyphicon glyphicon-star icon-success">{{ Form::radio('value_id', '4') }}</span> 
  <span class=" glyphicon glyphicon-star icon-success">{{ Form::radio('value_id', '5') }}</span>
        </div>

@if(Auth::user()->user_information->photo_fk != 0)
  <input type="hidden" name="photo_fk" class="form-control" id="photo_fk" value="{{ Auth::user()->user_information->photo->id }}">
@else  <input type="hidden" name="photo_fk" class="form-control" id="photo_fk" value="0">
@endif
            <div class="col-md-12">
           {{ Form::submit('Vertinti', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
          </div>

@endif
@endif
      {{ Form::close() }}
    
  </div>

@endsection
@section('scripts')
  <script src="/Style/Js/Image_upload.js"></script>
@endsection

