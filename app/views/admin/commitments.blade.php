@extends('backend', ['title' => 'Compromisos | Tablero de control público de seguimiento del PA15.'])

@section('content')
@include('backend_nav')

<div class="container">
	<div class="bs-docs-featurette bs-titles-pg">
		<h1 class="bs-docs-featurette-title">Compromisos <small>{{link_to('commitment/create', 'Crear Compromiso', array('class'=>'btn btn-primary'))}}</small></h1>
		<p class="lead"> Los compromisos cuentan con planes de trabajo con tres metas semestrales para su cumplimiento. Cada meta contiene actividades específicas a realizarse en periodos de 6 meses para cumplirlas, las cuales tienen indicadores, medios de verificación y responsables puntuales.</p>

		
	</div>
	<div class="row">
		<div class="col-lg-12">

<!-- users table -->
  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>plan</th>
        <th>funcionario</th>
        <th>agente externo</th>
        <th>*</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($commitments as $commitment)
      <tr>
        <td>{{$commitment->title}}</td>
        <td>
          @if(!empty($commitment->plan))
            <a href="/files/{{$commitment->plan}}" download>descargar</a>
          @endif
        </td>
        <td>{{$commitment->government_user}}</td>
        <td>{{$commitment->society_user}}</td>
        <td>
          <!-- update link -->
          {{link_to('commitment/' . $commitment->id . '/edit', 'editar')}}

          <!-- delete form -->
            {{Form::open([
              'url' => 'commitment/' . $commitment->id, 
              'method' => 'DELETE'
            ])}}

            <input type="submit" class="btn btn-xs btn-danger" value="eliminar">

            {{Form::close()}}             
        </td>
      </tr>
      <tr class="commitment_steps">
	       @foreach($commitment->steps AS $step)
            <td class="step"> 
				<?php  switch ($step->step_num):
				    case 1:
				        echo "<p>Primer Avance</p>";
				        break;
				    case 2:
				        echo "<p>Segundo Avance</p>";
				        break;
				    case 3:
				        echo "<p>Tercer Avance</p>";
				        break;
				    case 4:
				        echo "<p>Resultado Final</p>";
				        break;
				    default:
				 endswitch;?>
            
            	@foreach($step->objectives AS $objective)
            	
            	<?php  switch ($objective->status):
				    case 'a':
				        $status = "sin_avance";
				        break;
				    case 'b':
				        $status = "proceso";
				        break;
				    case 'c':
				        $status = "completado";
				        break;
				    default:
				        $status = "sin_avance";
				 endswitch;?>
            	
				{{link_to('objective/' . $objective->id . '/edit', $objective->status,array('class' => "objective $status"))}}
				@endforeach
            </td>
            @endforeach
      	
      </tr>
      @endforeach
    </tbody>
  </table>
  </div></div>
</div>
@stop