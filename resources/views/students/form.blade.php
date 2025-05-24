<div class="row g-3">
    <div class="col-md-4">
        <div class="form-floating mb-3">
            <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" value="{{ old('fname', $student->fname ?? '') }}" style="border-color: var(--mauve); border-radius: 0;">
            <label for="fname" class="text-muted">First Name</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-floating mb-3">
            <input type="text" name="mname" class="form-control" id="mname" placeholder="Middle Name" value="{{ old('mname', $student->mname ?? '') }}" style="border-color: var(--mauve); border-radius: 0;">
            <label for="mname" class="text-muted">Middle Name</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-floating mb-3">
            <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" value="{{ old('lname', $student->lname ?? '') }}" style="border-color: var(--mauve); border-radius: 0;">
            <label for="lname" class="text-muted">Last Name</label>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email', $student->email ?? '') }}" style="border-color: var(--mauve); border-radius: 0;">
            <label for="email" class="text-muted">Email</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="text" name="contact" class="form-control" id="contact" placeholder="Contact" value="{{ old('contact', $student->contact ?? '') }}" style="border-color: var(--mauve); border-radius: 0;">
            <label for="contact" class="text-muted">Contact</label>
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="address" class="form-label text-muted">Address</label>
    <textarea name="address" id="address" class="form-control" rows="3" style="border-color: var(--mauve); border-radius: 0;">{{ old('address', $student->address ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label for="image" class="form-label text-muted">Profile Image</label>
    @if(isset($student) && $student->image_path)
        <div class="mb-2">
            <img src="{{ asset($student->image_path) }}" alt="Student Profile" class="rounded" width="100" height="100" style="object-fit: cover;" />
        </div>
    @endif
    <input type="file" name="image" id="image" class="form-control" style="border-color: var(--mauve); border-radius: 0;">
</div>



</div>


