<form action={{ $destroy }} method="POST">
    @csrf
    @method('DELETE')
    <button type="delete" method="POST" class="btn btn-tool"><i class="fas fa-times"></i>
    </button>
</form>
