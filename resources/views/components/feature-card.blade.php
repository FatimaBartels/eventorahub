 <!-- Cards-->
      <div class="bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-lg hover:-translate-y-1 transition-all duration-200 overflow-hidden p-6 ">
                    <h3 class="text-xl font-semibold mb-3">{{ $title }}</h4>

                    <div class="mb-4">
                        <img src="{{  asset('storage/' . $image)  }}" alt="{{ $title }}" class="w-full h-48 object-cover rounded">
                    </div>

                    <div class="text-gray-700">
                        {{ $slot }}
                    </div>
                   
                </div>      