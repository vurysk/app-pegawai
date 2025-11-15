<x-layout pageTitle="Dashboard">
    <!-- HEADER -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-blue-900 bg-clip-text text-transparent">
            Employee Dashboard
        </h1>
        <p class="text-gray-500 mt-2 text-lg">Welcome to your modern workforce management system</p>
    </div>

    <!-- MAIN STATS CARDS - GLASS MORPHISM -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Employees Card -->
        <div class="bg-white/80 backdrop-blur-lg border border-white/20 rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-all duration-300 hover:scale-105">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Employees</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalEmployees }}</p>
                    <p class="text-green-600 text-sm font-medium mt-1">
                        ↑ 12% from last month
                    </p>
                </div>
                <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg">
                    <span class="text-2xl text-white">👥</span>
                </div>
            </div>
        </div>

        <!-- Present Today Card -->
        <div class="bg-white/80 backdrop-blur-lg border border-white/20 rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-all duration-300 hover:scale-105">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Present Today</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $presentToday }}</p>
                    <p class="text-green-600 text-sm font-medium mt-1">
                        {{ number_format(($presentToday/$totalEmployees)*100, 1) }}% attendance
                    </p>
                </div>
                <div class="p-3 bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg">
                    <span class="text-2xl text-white">✅</span>
                </div>
            </div>
        </div>

        <!-- Departments Card -->
        <div class="bg-white/80 backdrop-blur-lg border border-white/20 rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-all duration-300 hover:scale-105">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Departments</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalDepartments }}</p>
                    <p class="text-blue-600 text-sm font-medium mt-1">
                        Active teams
                    </p>
                </div>
                <div class="p-3 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg">
                    <span class="text-2xl text-white">🏢</span>
                </div>
            </div>
        </div>

        <!-- Monthly Attendance Card -->
        <div class="bg-white/80 backdrop-blur-lg border border-white/20 rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-all duration-300 hover:scale-105">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">This Month</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $attendanceThisMonth }}</p>
                    <p class="text-orange-600 text-sm font-medium mt-1">
                        Total attendances
                    </p>
                </div>
                <div class="p-3 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl shadow-lg">
                    <span class="text-2xl text-white">📅</span>
                </div>
            </div>
        </div>
    </div>

    <!-- QUICK ACTIONS - MODERN STYLE -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Quick Actions</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('employees.create') }}" class="group bg-gradient-to-br from-white to-gray-50 border border-gray-200 rounded-xl p-5 hover:shadow-xl transition-all duration-300 hover:border-blue-300 hover:scale-105">
                <div class="text-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                        <span class="text-2xl text-white">➕</span>
                    </div>
                    <p class="font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">Add Employee</p>
                    <p class="text-xs text-gray-500 mt-1">New team member</p>
                </div>
            </a>

            <a href="{{ route('attendances.create') }}" class="group bg-gradient-to-br from-white to-gray-50 border border-gray-200 rounded-xl p-5 hover:shadow-xl transition-all duration-300 hover:border-green-300 hover:scale-105">
                <div class="text-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                        <span class="text-2xl text-white">⏰</span>
                    </div>
                    <p class="font-semibold text-gray-800 group-hover:text-green-600 transition-colors">Take Attendance</p>
                    <p class="text-xs text-gray-500 mt-1">Record presence</p>
                </div>
            </a>

            <a href="{{ route('salaries.index') }}" class="group bg-gradient-to-br from-white to-gray-50 border border-gray-200 rounded-xl p-5 hover:shadow-xl transition-all duration-300 hover:border-yellow-300 hover:scale-105">
                <div class="text-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                        <span class="text-2xl text-white">💰</span>
                    </div>
                    <p class="font-semibold text-gray-800 group-hover:text-yellow-600 transition-colors">Salary Records</p>
                    <p class="text-xs text-gray-500 mt-1">Payroll management</p>
                </div>
            </a>

            <a href="{{ route('reports') }}" class="group bg-gradient-to-br from-white to-gray-50 border border-gray-200 rounded-xl p-5 hover:shadow-xl transition-all duration-300 hover:border-purple-300 hover:scale-105">
                <div class="text-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                        <span class="text-2xl text-white">📊</span>
                    </div>
                    <p class="font-semibold text-gray-800 group-hover:text-purple-600 transition-colors">View Reports</p>
                    <p class="text-xs text-gray-500 mt-1">Analytics & insights</p>
                </div>
            </a>
        </div>
    </div>

    <!-- TWO COLUMN LAYOUT -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- RECENT ACTIVITY -->
        <div class="bg-white/80 backdrop-blur-lg border border-white/20 rounded-2xl shadow-xl p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gray-900">Recent Activity</h2>
                <span class="text-sm text-blue-600 font-medium">View All</span>
            </div>
            <div class="space-y-4">
                @foreach($recentActivities as $activity)
                <div class="flex items-center space-x-4 p-3 hover:bg-gray-50/50 rounded-xl transition-colors duration-200">
                    <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center shadow-lg">
                        <span class="text-white text-sm">👤</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">{{ $activity->description }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $activity->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="flex-shrink-0">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            New
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- ATTENDANCE OVERVIEW -->
        <div class="bg-white/80 backdrop-blur-lg border border-white/20 rounded-2xl shadow-xl p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Attendance Overview</h2>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="text-sm font-medium text-gray-700">Present</span>
                    <div class="flex items-center space-x-2">
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 85%"></div>
                        </div>
                        <span class="text-sm font-bold text-gray-900">85%</span>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm font-medium text-gray-700">Late</span>
                    <div class="flex items-center space-x-2">
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div class="bg-yellow-500 h-2 rounded-full" style="width: 12%"></div>
                        </div>
                        <span class="text-sm font-bold text-gray-900">12%</span>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm font-medium text-gray-700">Absent</span>
                    <div class="flex items-center space-x-2">
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div class="bg-red-500 h-2 rounded-full" style="width: 3%"></div>
                        </div>
                        <span class="text-sm font-bold text-gray-900">3%</span>
                    </div>
                </div>
                <div class="pt-4 border-t border-gray-200">
                    <div class="text-center">
                        <p class="text-sm text-gray-600">Overall performance this week</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">94%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>