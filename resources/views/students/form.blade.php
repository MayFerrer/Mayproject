<div class="mb-3">
    <label>First Name</label>
    <input type="text" name="fname" class="form-control" value="{{ old('fname', $student->fname ?? '') }}">
</div>
<div class="mb-3">
    <label>Middle Name</label>
    <input type="text" name="mname" class="form-control" value="{{ old('mname', $student->mname ?? '') }}">
</div>
<div class="mb-3">
    <label>Last Name</label>
    <input type="text" name="lname" class="form-control" value="{{ old('lname', $student->lname ?? '') }}">
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $student->email ?? '') }}">
</div>
<div class="mb-3">
    <label>Address</label>
    <textarea name="address" class="form-control">{{ old('address', $student->address ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>Contact</label>
    <input type="text" name="contact" class="form-control" value="{{ old('contact', $student->contact ?? '') }}">
</div>
<div class="mb-3">
    <label>Image</label>
    @if(isset($student) && $student->image_path)
        <div><img src="{{ asset($student->image_path) }}" width="100" /></div>
    @endif
    <input type="file" name="image" class="form-control">
</div>


