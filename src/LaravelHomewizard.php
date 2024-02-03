<?php

namespace TychoEngberink\LaravelHomewizard;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class LaravelHomewizard
{
    private Client $client;

    private string $url;

    public function __construct(private readonly string $ipAddress)
    {
        $this->url = 'http://' . $this->ipAddress . '/api/v1/data';
        $this->client = new Client();
        $this->data = $this->getData();
    }

    /**
     * @return array<string, mixed>|false
     * @throws GuzzleException
     */
    public function getData()
    {
       return Cache::remember('homewizard_data', 1, function(){
                /** @var Response $reponse */
            $response =  $this->client->get($this->url);
            return json_decode($response->getBody(), true);
        });
    }

    /**
     * @return ?string
     * @throws GuzzleException
     */
        public function getWifiSsid(): ?string
        {
           return Arr::get($this->data, 'wifi_ssid');
        }


    /**
     * @return ?int
     */
    public function getWifiStrength(): ?int
    {
        return Arr::get($this->data, 'wifi_strength');
    }

    /**
     * @return ?int
     */
    public function getSmrVersion(): ?int
    {
        return Arr::get($this->data, 'smr_version');
    }

    /**
     * @return ?string
     */
    public function getMeterModel(): ?string
    {
        return Arr::get($this->data, 'meter_model');
    }

    /**
     * @return ?string
     */
    public function getUniqueId(): ?string
    {
        return Arr::get($this->data, 'unique_id');
    }

    /**
     * @return ?int
     */
    public function getActiveTariff(): ?int
    {
        return Arr::get($this->data, 'active_tariff');
    }

    /**
     * @return ?float
     */
    public function getTotalPowerImportKwh(): ?float
    {
        return Arr::get($this->data, 'total_power_import_kwh');
    }

    /**
     * @return ?float
     */
    public function getTotalPowerImportT1Kwh(): ?float
    {
        return Arr::get($this->data, 'total_power_import_t1_kwh');
    }

    /**
     * @return ?float
     */
    public function getTotalPowerImportT2Kwh(): ?float
    {
        return Arr::get($this->data, 'total_power_import_t2_kwh');
    }

    /**
     * @return ?float
     */
    public function getTotalPowerExportKwh(): ?float
    {
        return Arr::get($this->data, 'total_power_export_kwh');
    }

    /**
     * @return ?float
     */
    public function getTotalPowerExportT1Kwh(): ?float
    {
        return Arr::get($this->data, 'total_power_export_t1_kwh');
    }

    /**
     * @return ?float
     */
    public function getTotalPowerExportT2Kwh(): ?float
    {
        return Arr::get($this->data, 'total_power_export_t2_kwh');
    }

    /**
     * @return ?int
     */
    public function getActivePowerW(): ?int
    {
        return Arr::get($this->data, 'active_power_w');
    }

    /**
     * @return ?int
     */
    public function getActivePowerL1W(): ?int
    {
        return Arr::get($this->data, 'active_power_l1_w');
    }

    /**
     * @return ?float
     */
    public function getActiveVoltageL1V(): ?float
    {
        return Arr::get($this->data, 'active_voltage_l1_v');
    }

    /**
     * @return ?float
     */
    public function getActiveCurrentL1A(): ?float
    {
        return Arr::get($this->data, 'active_current_l1_a');
    }

    /**
     * @return ?int
     */
    public function getVoltageSagL1Count(): ?int
    {
        return Arr::get($this->data, 'voltage_sag_l1_count');
    }

    /**
     * @return ?int
     */
    public function getVoltageSwellL1Count(): ?int
    {
        return Arr::get($this->data, 'voltage_swell_l1_count');
    }

    /**
     * @return ?int
     */
    public function getAnyPowerFailCount(): ?int
    {
        return Arr::get($this->data, 'any_power_fail_count');
    }

    /**
     * @return ?int
     */
    public function getLongPowerFailCount(): ?int
    {
        return Arr::get($this->data, 'long_power_fail_count');
    }

    /**
     * @return ?float
     */
    public function getTotalGasM3(): ?float
    {
        return Arr::get($this->data, 'total_gas_m3');
    }

    /**
     * @return ?int
     */
    public function getGasTimestamp(): ?int
    {
        return Arr::get($this->data, 'gas_timestamp');
    }

    /**
     * @return ?string
     */
    public function getGasUniqueId(): ?string
    {
        return Arr::get($this->data, 'gas_unique_id');
    }

    /**
     * @return array|null
     */
    public function getExternal(): ?array
    {
        return Arr::get($this->data, 'external');
    }
}
