@extends('backend.master')

@section('content')
<div class="main-content" style="display:flex; justify-content:flex-start; align-items:flex-start; margin-top:20px;">
  <div class="card" style="margin:0 auto 20px; padding:20px; max-width:95%; width:95%;">

    <!-- হেডিং -->
    <h3 style="margin-bottom:15px; font-size:1.8rem; color:#6c63ff; text-align:left;">
      Customer List
    </h3>

    <!-- টেবিল -->
    <table style="width:100%; border-collapse:separate; border-spacing:0 10px; font-size:1.05rem; min-width:700px;">
      <thead>
        <tr style="background:#e0e5ec; box-shadow: inset 3px 3px 6px #a3b1c6, inset -3px -3px 6px #fff;">
          <th style="padding:15px; text-align:left;">Customer ID</th>
          <th style="padding:15px; text-align:left;">Name</th>
          <th style="padding:15px; text-align:left;">Phone</th>
          <th style="padding:15px; text-align:left;">Address</th>
          <th style="padding:15px; text-align:left;">Total</th>
          <th style="padding:15px; text-align:left;">Due</th>
          <th style="padding:15px; text-align:center;">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse($customers as $customer)
          <tr style="background:#e0e5ec; box-shadow: 4px 4px 10px #a3b1c6, -4px -4px 10px #fff; border-radius:12px;">
            <td style="padding:15px; font-weight:600;">{{ $customer->customer_id }}</td>
            <td style="padding:15px;">{{ $customer->name }}</td>
            <td style="padding:15px;">{{ $customer->phone }}</td>
            <td style="padding:15px;">{{ $customer->address }}</td>
            <td style="padding:15px;">{{ number_format($customer->total_pay, 2) }}</td>
            <td style="padding:15px; font-weight:bold; color:{{ $customer->total_due > 0 ? 'red' : 'green' }};">
              {{ number_format($customer->total_due, 2) }}
            </td>
            <td style="padding:15px; text-align:center;">
              <a href="#" style="padding:8px 15px; background:#6c63ff; color:white; font-weight:600;
                 border-radius:12px; text-decoration:none; display:inline-block;
                 box-shadow:4px 4px 8px #a3b1c6, -4px -4px 8px #fff;">
                View
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" style="text-align:center; padding:20px; color:#888; font-size:1.1rem;">
              No Customers Found
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<style>
/* Ensure content starts from top */
.main-content {
  display: flex;
  justify-content: flex-start;
  align-items: flex-start;
  margin-top: 10px;
}

/* Table Row Hover Effect */
table tbody tr:hover {
  transform: scale(1.01);
  transition: 0.2s ease-in-out;
  box-shadow: 6px 6px 12px #a3b1c6, -6px -6px 12px #fff;
}

/* Responsive */
@media (max-width: 768px) {
  table {
    font-size: 0.9rem;
    min-width: 600px;
  }
  .card {
    padding: 15px;
    margin: 0 auto 15px;
  }
  h3 {
    font-size: 1.4rem;
  }
}
</style>
@endsection
