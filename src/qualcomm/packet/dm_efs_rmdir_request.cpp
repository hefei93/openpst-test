/**
*
* (c) Gassan Idriss <ghassani@gmail.com>
* 
* This file is part of libopenpst.
* 
* libopenpst is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
* 
* libopenpst is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with libopenpst. If not, see <http://www.gnu.org/licenses/>.
*
* @file dm_efs_rmdir_request.cpp
* @package openpst/libopenpst
* @brief 
*
* @author Gassan Idriss <ghassani@gmail.com>
*/

#include "qualcomm/packet/dm_efs_rmdir_request.h"

using namespace OpenPST::Qualcomm;

DmEfsRmdirRequest::DmEfsRmdirRequest(PacketEndianess targetEndian) : DmEfsPacket(targetEndian)
{
	addField("path", kPacketFieldTypeVariant, 0);

	setSubsysCommand(kDiagEfsRmdir);
}

DmEfsRmdirRequest::~DmEfsRmdirRequest()
{

}

std::vector<uint8_t> DmEfsRmdirRequest::getPath()
{
	return read(getFieldSize("path"), getFieldOffset("path"));
}
                
void DmEfsRmdirRequest::setPath(uint8_t* data, size_t size)
{
    write("path", data, size);
}

void DmEfsRmdirRequest::prepareResponse()
{
	if (response == nullptr) {
		DmEfsRmdirResponse* resp = new DmEfsRmdirResponse();
		response = resp;
	}
}

void DmEfsRmdirRequest::unpack(std::vector<uint8_t>& data, TransportInterface* transport)
{
	//variable
}
