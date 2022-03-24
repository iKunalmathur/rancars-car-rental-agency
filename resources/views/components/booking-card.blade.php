@props(['booking'])
<div class="bg-white shadow-sm p-6 rounded-lg border sm:col-span-1">
    <p><strong>Name:</strong> {{$booking->buyer->name}}</p>
    <p><strong>Email :</strong> {{$booking->buyer->email}}</p>
    <p><strong>Rent :</strong> ₹ {{$booking->rent}} / per day</p>
    <p><strong>Start Date :</strong> {{$booking->start_date}} </p>
    <p><strong>End Date :</strong> {{$booking->end_date ?? "not provided"}} </p>
</div>