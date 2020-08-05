Form input to database
=======================

1. Create a model
2. Create a route to controller
3. Create a store method in the controller file
4. Create a view file containing the form

Form
-----
Form should use post method and action the route that points to the controller store method. Include csrf to prevent cross site request forgery.

```
<form method "post" action="{{ url("/posts") }}"> 
@csrf
  <textarea class="textarea form-control" name="body" id="body" cols="38" rows="10" placeholder="whats up doc?"></textarea>
<button class="btn btn-primary float-right" type="Submit">Submit</button>

```

Display errors for mandatory fields

```
  @error('body')
  <p class="text-danger">{{ $message }}</p>
  @enderror
  
  ```
  
  Using named routes
  -------------------
  
  In the web.php file create a named route e.g
  
  ```
  Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
  ```
  
  In the form action field you can now reference the named route plus the wildcard 
  
  ```
  <action="{{ route('articles.show', $article }}">
  
  Form validation
  ----------------
You can enter validation e.g required in the form field.  You can also enter validation in the controller.  In the form field you can mar errors to display red text and mark form fields to display as red when the form is sumitted with errors.
  
Inserting a value of old will ensure that when the form is submitted with errors, the entered text is returned to the field.

  ```
  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="body">Body</label><br>
  <div class="col-md-6">
    <textarea class="form-control {{ $errors->has('body') ? 'is-danger' : ''}} " name="body" id="body" value="{{ old('body') }}" required></textarea>
    @if ($errors->has('body'))
    <p class="help is-danger"> {{ $errors->first('body') }} </p>
    @endif
  </div>  </div>
  ```
  
  Controller
  ---------
  
  ```
   public function store(Request $Request)
    {   

       $attributes = request()->validate([ 'body'=> 'required|max:255' ]);

        Tweet::create([
         'body' => $attributes['body']

        ]);
    
                   return redirect('/news');
    }
    
 ```