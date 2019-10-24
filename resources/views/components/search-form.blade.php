<form method="get" action="/vacancies/search">
    <p>
     <input type="text" name="q" required="" class="text" placeholder="Enter Keyword(s)" style="color: grey; background-color: white;border-radius: 5px" value="" onfocus="" onblur="">
     <select name="location" class="location-select" style="border-radius: 5px; margin-top: 0.3em">

         <option value="-1">All Locations</option>
         @foreach(\App\Location::active() as $l)
         <option value="{{ $l->id }}">{{ $l->name }}</option>
         @endforeach
     </select>
     <label class="btn2 btn-2 btn2-1b"><input type="submit" value="Find Jobs"></label>
    </p>
</form> 