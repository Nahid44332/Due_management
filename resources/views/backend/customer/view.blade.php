@extends('backend.master')

@section('content')
    <div class="main-content" style="display:flex; justify-content:center; align-items:flex-start; margin-top:20px;">
        <div class="card" style="margin:0 auto 20px; padding:20px; max-width:90%; width:90%;">

            <!-- হেডিং -->
            <h3 style="margin-bottom:15px; font-size:1.8rem; color:#6c63ff; text-align:left;">
                Customer Details
            </h3>

            <!-- কাস্টমার ইনফো -->
            <div
                style="display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:20px; margin-bottom:25px;">
                <div
                    style="background:#e0e5ec; padding:15px; border-radius:12px; box-shadow:4px 4px 8px #a3b1c6, -4px -4px 8px #fff;">
                    <strong>ID:</strong> {{ $customer->customer_id }}
                </div>
                <div
                    style="background:#e0e5ec; padding:15px; border-radius:12px; box-shadow:4px 4px 8px #a3b1c6, -4px -4px 8px #fff;">
                    <strong>Name:</strong> {{ $customer->name }}
                </div>
                <div
                    style="background:#e0e5ec; padding:15px; border-radius:12px; box-shadow:4px 4px 8px #a3b1c6, -4px -4px 8px #fff;">
                    <strong>Phone:</strong> {{ $customer->phone }}
                </div>
                <div
                    style="background:#e0e5ec; padding:15px; border-radius:12px; box-shadow:4px 4px 8px #a3b1c6, -4px -4px 8px #fff;">
                    <strong>Address:</strong> {{ $customer->address }}
                </div>
            </div>

            <!-- ট্রানজেকশন হিস্টোরি -->
            <h4 style="margin:20px 0; color:#6c63ff;">Transaction History</h4>
            <table style="width:100%; border-collapse:separate; border-spacing:0 10px; font-size:1rem; min-width:600px;">
                <thead>
                    <tr style="background:#e0e5ec; box-shadow: inset 3px 3px 6px #a3b1c6, inset -3px -3px 6px #fff;">
                        <th style="padding:10px;">Date</th>
                        <th style="padding:5px;">Transaction No</th>
                        <th style="padding:10px;">Description</th>
                        <th style="padding:10px;">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $txn)
                        <tr style="background:#e0e5ec; box-shadow: 4px 4px 10px #a3b1c6, -4px -4px 10px #fff;">
                            <td style="padding:10px;">{{ $txn->created_at}}</td>
                            <td style="padding:10px;">{{ $txn->transaction_no }}</td>
                            <td style="padding:10px;">{{ $txn->description }}</td>
                            <td style="padding:10px;">{{ number_format($txn->amount, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <!-- এখানে ৪ কলামের জন্য colspan -->
                            <td colspan="4" style="text-align:center; padding:15px; color:#888;">
                                No Transactions Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>


            <!-- Bottom Summary -->
            <div style="margin-top:25px; text-align:right;">
                <p><strong>Total:</strong> {{ number_format($customer->total_pay, 2) }}</p>
                <p style="color:red;"><strong>Due:</strong> {{ number_format($customer->total_due, 2) }}</p>
                <p style="color:green; font-weight:bold;">
                    <strong>Paid Amount:</strong> {{ number_format($customer->total_pay - $customer->total_due, 2) }}
                </p>
            </div>

            <!-- Due Payment Form -->
            @if ($customer->total_due > 0)
                <div
                    style="margin-top:25px; background:#e0e5ec; padding:20px; border-radius:12px;
                box-shadow:4px 4px 8px #a3b1c6, -4px -4px 8px #fff;">
                    <h4 style="margin-bottom:15px; color:#6c63ff;">Pay Due</h4>

                    @if (session('success'))
                        <div
                            style="padding:10px; background:#d4edda; color:#155724; border-radius:8px; margin-bottom:15px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ url('/admin/customer/pay-due/' . $customer->id) }}" method="POST"
                        style="display:flex; gap:10px; flex-wrap:wrap;">
                        @csrf
                        <input type="number" name="amount" step="0.01" placeholder="Enter amount"
                            style="flex:1; padding:10px; border-radius:8px; border:none; 
                      background:#f0f0f3; box-shadow:inset 3px 3px 6px #a3b1c6, inset -3px -3px 6px #fff;"
                            required>

                        <button type="submit"
                            style="padding:10px 20px; background:#6c63ff; color:white; font-weight:600;
                border:none; border-radius:8px; cursor:pointer;
                box-shadow:4px 4px 8px #a3b1c6, -4px -4px 8px #fff;">
                            Submit
                        </button>
                    </form>
                </div>
            @endif

            <!-- Back Button -->
            <div style="margin-top:20px; text-align:left;">
                <a href="{{ url('/admin/customer/list') }}"
                    style="padding:8px 15px; background:#6c63ff; color:white; font-weight:600;
        border-radius:12px; text-decoration:none; display:inline-block;
        box-shadow:4px 4px 8px #a3b1c6, -4px -4px 8px #fff;">
                    ← Back to List
                </a>
            </div>

        </div>
    </div>

    <style>
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
                min-width: 500px;
            }

            .card {
                padding: 15px;
            }

            h3 {
                font-size: 1.4rem;
            }
        }
    </style>
@endsection
