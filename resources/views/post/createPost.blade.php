@extends('post.layout')

          <!-- Comments Form -->           
          <div class="card my-4">
            <h5 class="card-header">Hey, {{Auth::user()->name}} create a new post:</h5>
            <div class="card-body">
              <form method="POST" action="/cpost" id="registration">
                {{csrf_field() }}
                <div class="form-group">
                  <TEXTAREA class="form-control" name="title" row="2" placeholder="Give a title" required></TEXTAREA> <br>
                  <textarea class="form-control" name="description" rows="6" placeholder="Write your post here" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
       

 @extends('post.footer')        
         

       