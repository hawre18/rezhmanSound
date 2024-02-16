<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    
        <div>
          
           <p>{{ $body }}</p>
           <p>{{ $pin }}</p>
           
        </div>
 </form>
</x-guest-layout>
