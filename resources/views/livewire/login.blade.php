<div>
    @if(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif
    <div class="login-container">
        <div class="login-form">
            <h2 class="text-center mb-4">Login</h2>
            <div class="form-group">
                <input wire:model="email" type="text" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input wire:model="password" type="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button wire:click="login" type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </div>
    </div>
</div>
