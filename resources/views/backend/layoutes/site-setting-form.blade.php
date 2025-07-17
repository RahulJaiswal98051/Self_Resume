<div class="row">
  <div class="col-12 col-md-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Site Settings</h4>
        <form class="forms-sample" action="{{ route('site-setting-submit') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1"> Site Name</label>
            <input type="text" class="form-control"  placeholder="siteName" name="sitename" id="sitename" value="{{ old('sitename', $settings['sitename'] ?? '') }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Email address</label>
            <input type="email" class="form-control"  placeholder="Email" name="email" id="email" value="{{ old('email', $settings['email'] ?? '') }}">
          </div>
          <div class="form-group">
            <label>Logo </label>
            <input type="file" name="logo" class="form-control file-upload-info" placeholder="Upload Image">
          </div>
          <div class="form-group">
            <label for="exampleInputCity1">City</label>
            <input type="text" class="form-control"  placeholder="Location" name="city" id="city" value="{{ old('city', $settings['city'] ?? '') }}">
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
