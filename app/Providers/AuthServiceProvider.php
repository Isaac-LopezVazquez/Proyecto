<?php

namespace App\Providers;
use App\Models\Prenda;
use App\Policies\PrendaPolicy;
use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        Prenda::class => PrendaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }

	/**
	 * The policy mappings for the application.
	 * 
	 * @return array<class-string, class-string>
	 */
	public function getPolicies() {
		return $this->policies;
	}
	
	/**
	 * The policy mappings for the application.
	 * 
	 * @param array<class-string, class-string> $policies The policy mappings for the application.
	 * @return self
	 */
	public function setPolicies($policies): self {
		$this->policies = $policies;
		return $this;
	}
}
