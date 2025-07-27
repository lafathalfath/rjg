<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') ?: 'Laravel' }} | Edit Layout</title>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />

    <style>
        #canvas {
            background: white;
            width: 100%;
            height: 100%;
            overflow: scroll;
        }
        #sidebar {
            transition: width 0.3s, height 0.3s, overflow 0.3s;
        }
    </style>
</head>
<body class="w-[100dvw] h-[100dvh] overflow-hidden">

    <div class="relative w-full h-full overflow-hidden">
        
        <nav class="absolute top-0 left-0 w-[350px] h-[100dvh] p-2">
            <div class="bg-gray-500 w-full h-full p-2 overflow-scroll rounded-xl text-white" id="sidebar">
                <button class="text-xl font-bold px-3 py-1 cursor-pointer" onclick="toggleSidebar()">&#9776;</button>

                <div id="sidebar-content">
                    lkzmlvkmzckvnzlckvn
                </div>
            </div>
        </nav>
        
        <div class="p-5 w-full h-full overflow-hidden bg-gray-200">
            <div id="canvas">
            </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script>
        const load = () => {
            const sidebar = document.getElementById('sidebar')
            const sidebarContent = document.getElementById('sidebar-content')
            sidebar.style.cssText = sessionStorage.getItem('sidebar')
            sidebarContent.style.cssText = sessionStorage.getItem('sidebar-content')
        }
        
        const save = () => {
            const sidebar = document.getElementById('sidebar')
            const sidebarContent = document.getElementById('sidebar-content')
            sessionStorage.setItem('sidebar', sidebar.style.cssText)
            sessionStorage.setItem('sidebar-content', sidebarContent.style.cssText)
        }

        const toggleSidebar = () => {
            const sidebar = document.getElementById('sidebar')
            const sidebarContent = document.getElementById('sidebar-content')
            if (sidebarContent.style.display == '') {
                sidebar.style.width = '58px'
                sidebar.style.height = '52px'
                sidebar.style.overflow = 'hidden'
            } else {
                sidebar.style.width = '100%'
                sidebar.style.height = '100%'
                sidebar.style.overflow = 'scroll'
            }
            sidebarContent.style.display = sidebarContent.style.display == 'none' ? '' : 'none'
            save()
        }

        load()
    </script>
</body>
</html>