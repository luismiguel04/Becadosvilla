 <form method="GET" action="{{ route('searche') }}" role="search">
     <div class="row">
         <div class="col-8">
             <div class="input-group">
                 <select name="search" id="search" class="form-control">

                     @foreach ($programas as $item)
                     @if($item->id== $query)
                     <option value="{{ $item->id }}" selected>
                         {{ $item->nombre }}
                     </option>
                     @else
                     <option value="{{ $item->id }}">
                         {{ $item->nombre }}
                     </option>
                     @endif
                     @endforeach
                 </select>
                 <span class="input-group-btn">
                     <button class=" btn btn-primary" type="submit">seleccionar
                         programa</button>
                 </span>
             </div>
         </div>
     </div>
 </form>