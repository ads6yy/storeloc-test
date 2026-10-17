<html>
    <head>
        <title>Storeloc Test</title>
        <style>
            .form {
                display: flex;
                gap: 12px;
            }
            .bounds, .filters {
                display: flex;
                flex-direction: column;
                gap: 12px;
                justify-content: stretch;
            }
            table.results {
                width: 100%;
                border-collapse: collapse;
                font-family: sans-serif;
                font-size: 0.9rem;
            }
            table.results thead th {
                padding: 12px 15px;
                background-color: #f4f4f4;
                border-bottom: 2px solid #ccc;
                text-align: left;
            }
            table.results td {
                padding: 12px 15px;
                border-bottom: 1px solid #e0e0e0;
            }
            table.results tbody tr:hover {
                background-color: #f5f5f5;
                cursor: pointer;
            }
        </style>
        </style>
    </head>
    <body>
        @yield('content')
    </body>
</html>
