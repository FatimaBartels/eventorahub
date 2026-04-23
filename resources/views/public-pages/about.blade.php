
 @extends('layouts.public') 

 @section('title', 'About Us') 

 @section('content') 


<section class="py-16 bg-white">
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div>
        <h2 class="text-dark text-3xl font-bold mb-5 pt-5">About EventoraHub</h2>
        <p class="text-light text-base leading-7 mb-4">EventoraHub is a modern event booking platform designed to help users discover, explore, and reserve spots for exciting events with ease. Whether you're looking for workshops, concerts, or community gatherings, EventoraHub brings everything together in one place.</p>
        <p class="text-light text-base leading-7 mb-4">Our goal is to simplify the booking experience while providing event organizers with a powerful tool to manage and showcase their events. Users can browse upcoming events, view detailed information, and secure their place in just a few clicks.</p>
        <p class="text-light text-base leading-7 mb-4">We focus on delivering a smooth, user-friendly experience with clear event details, real-time availability, and a reliable booking system.</p>
        </div>
    <hr class="my-10 border-t-2 border-gray-200">
    <div >
        <h2 class="text-dark text-3xl font-bold mb-5">How Booking Works</h2>
        <ol class="list-decimal ml-6">
            <li class="text-light text-base leading-7 mb-4">Browse available events on the platform</li>
            <li class="text-light text-base leading-7 mb-4">Select an event to view its details</li>
            <li class="text-light text-base leading-7 mb-4">Click “Book Event”</li>
            <li class="text-light text-base leading-7 mb-4">Confirm your booking</li>
            <li class="text-light text-base leading-7 mb-4">View your bookings in your dashboard</li>
        </ol>
    </div>
    <hr class="my-10 border-t-2 border-gray-200">
    <div>
        <h2 class="text-dark text-3xl font-bold mb-5">Booking Rules & Policies</h2>
        <p class="text-light text-base leading-7 mb-4">To ensure a fair and smooth experience for all users, please follow these guidelines:</p>
        <ol class="list-decimal ml-6">
            <li class="text-lg font-medium mb-2" >Account Requirement</li>
            <p class="text-light text-base leading-7 mb-4" >You must be registered and logged in to book an event.</p>
            <li class="text-lg font-medium mb-2">One Booking per Event</li>
            <p class="text-light text-base leading-7 mb-4">Each user can only book a specific event once unless stated otherwise.</p>
            <li class="text-lg font-medium mb-2">Event Capacity</li>
            <p class="text-light text-base leading-7 mb-4">Bookings are subject to availability. Once an event reaches its maximum capacity, no further bookings can be made.</p>
            <li class="text-lg font-medium mb-2">Accurate Information</li>
            <p class="text-light text-base leading-7 mb-4">Users are responsible for providing accurate information when booking.</p>
            <li class="text-lg font-medium mb-2">Cancellation Policy</li>
            <p class="text-light text-base leading-7 mb-4">Users are responsible for providing accurate information when booking.</p>
            <li class="text-lg font-medium mb-2">Organizer Rights</li>
            <p class="text-light text-base leading-7 mb-4">Event organizers reserve the right to update or cancel events if necessary.</p>
            <li class="text-lg font-medium mb-2">Respectful Participation</li>
            <p class="text-light text-base leading-7 mb-4">Users are expected to behave respectfully during events. Misconduct may result in removal from the event or platform.</p>
        </ol>
    </div>
    <hr class="my-10 border-t-2 border-gray-200">
    <div>
        <h2 class="text-text-dark text-3xl font-bold mb-5">Our Mission</h2>
        <p class="text-light text-base leading-7 mb-4">At EventoraHub, we aim to connect people through meaningful experiences by making event discovery and booking simple, efficient, and accessible to everyone.</p>
    </div>
    <hr class="my-10 border-t-2 border-gray-200">
    <div>
        <h2 class="text-text-dark text-3xl font-bold mb-5">Contact Us</h2>
        <p class="text-light text-base leading-7 mb-4">Contact Name: Fatima Bartels</p>
        <p class="text-light text-base leading-7 mb-4">LinkedIn: <a href="https://www.linkedin.com/in/fatimabartels/" target="_blank" >Fatima Bartels</a></p>
    </div>
</div>
</section>

@endsection