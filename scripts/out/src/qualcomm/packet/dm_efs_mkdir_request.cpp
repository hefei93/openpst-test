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
* @file dm_efs_mkdir_request.cpp
* @package openpst/libopenpst
* @brief 
*
* @author Gassan Idriss <ghassani@gmail.com>
*/

#include "qualcomm/packet/dm_efs_mkdir_request.h"

using namespace OpenPST::QC;

DmEfsMkdirRequest::DmEfsMkdirRequest(PacketEndianess targetEndian) : DmEfsPacket(targetEndian)
{
	addField("mode", kPacketFieldTypePrimitive, sizeof(uint32_t));
	addField("path", kPacketFieldTypeVariant, 0);

}

DmEfsMkdirRequest::~DmEfsMkdirRequest()
{

}

uint32_t DmEfsMkdirRequest::getMode()
{
    return read<uint32_t>(getFieldOffset("mode"));
}
                
void DmEfsMkdirRequest::setMode(uint32_t mode)
{
    write<uint32_t>("mode", mode);
}
std::vector<uint8_t> DmEfsMkdirRequest::getPath()
{
	return read(getFieldSize("path"), getFieldOffset("path"));
}
                
void DmEfsMkdirRequest::setPath(uint8_t* data, size_t size)
{
    write("path", data, size);
}

void DmEfsMkdirRequest::unpack(std::vector<uint8_t>& data)
{
	DmEfsPacket::unpack(data);
}